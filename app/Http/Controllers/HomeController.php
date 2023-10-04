<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use App\Jobs\productviews;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\Support\Facades\DB;

use Session;

use Stripe;

use RealRashid\SweetAlert\Facades\Alert;




class HomeController extends Controller
{

    public function index()
    {
        $product = Product::all();
        return view('home.userpage', compact('product'));

    }

    public function redirect(){
        $usertype=Auth::user()->usertype;

        if($usertype=='1')
        {
            $total_product=product::all()->count();

            $total_order=order::all()->count();

            $total_customer=user::all()->count();

            $order=order::all();

            $total_revenue=0;

            foreach($order as $order){
                $total_revenue=$total_revenue + $order->price;

            }

            $total_delivered=order::where('delivery_status', '=', 'delivered')->get()->count();

            $total_processing=order::where('delivery_status', '=', 'processing')->get()->count();

            $topSellingProducts = DB::table('products')
            ->select('products.title', 'products.price', DB::raw('COUNT(orders.product_id) as total_orders'))
            ->leftJoin('orders', 'products.id', '=', 'orders.product_id')
            ->groupBy('products.id', 'products.title', 'products.price')
            ->orderByDesc('total_orders')
            ->take(3) // Adjust the number as needed
            ->get();

            $mostProfitableCategories = DB::table('products')
            ->select('products.category', DB::raw('SUM(orders.price) as total_revenue'))
            ->join('orders', 'products.id', '=', 'orders.product_id')
            ->groupBy('products.category')
            ->orderByDesc('total_revenue')
            ->get();

            // Calculate the total number of customers
            $totalCustomers = DB::table('orders')
            ->distinct('user_id')
            ->count('user_id');
    
           // Calculate the number of customers who made repeat purchases (retained customers)
           $retainedCustomers = DB::table('orders')
            ->distinct('user_id')
            ->whereNotIn('user_id', function ($query) {
                $query->select('user_id')
                    ->from('orders')
                    ->whereRaw('DATE(created_at) <= DATE_SUB(NOW(), INTERVAL 365 DAY)');
            })
            ->count('user_id');

           // Calculate the churn rate
            $churnRate = (($totalCustomers - $retainedCustomers) / $totalCustomers) * 100;

           // Calculate the retention rate
           $retentionRate = 100 - $churnRate;


           $repeatCustomers = User::select('users.id', 'users.name', DB::raw('COUNT(orders.id) as order_count'))
           ->join('orders', 'users.id', '=', 'orders.user_id')
           ->groupBy('users.id', 'users.name')
           ->havingRaw('order_count > 1')
           ->get();

           // Retrieve data from the orders table and group it by month
           $orderData = DB::table('orders')
           ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as order_count'))
           ->groupBy(DB::raw('MONTH(created_at)'))
           ->get();

           // Prepare the data for Chart.js
           $labels = [];
           $data = [];
           foreach ($orderData as $row) {
           $monthName = date("F", mktime(0, 0, 0, $row->month, 1));
           $labels[] = $monthName;
           $data[] = $row->order_count;

           // User behavior segmentation code
           $dailyThreshold = 7;      // Logins in the last 7 days
           $weeklyThreshold = 30;    // Logins in the last 30 days
           $monthlyThreshold = 90;   // Logins in the last 90 days
           
           $userSegmentation = User::leftJoin('login_histories', 'users.id', '=', 'login_histories.user_id')
               ->select('users.id', 'users.name')
               ->selectRaw("CASE
                               WHEN COUNT(login_histories.id) >= $dailyThreshold THEN 'Daily'
                               WHEN COUNT(login_histories.id) >= $weeklyThreshold THEN 'Weekly'
                               WHEN COUNT(login_histories.id) >= $monthlyThreshold THEN 'Monthly'
                               ELSE 'Inactive'
                           END AS login_segment")
               ->groupBy('users.id', 'users.name')
               ->get();

            // Calculate revenue per month
            $revenuePerMonth = DB::table('orders')
            ->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('SUM(price) as revenue'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

                    // Calculate total sales
        $totalSales = DB::table('orders')->sum('price');

        // Calculate sales paid by cash and by card
        $salesPaidByCash = DB::table('orders')
            ->where('payment_status', 'cash on delivery')
            ->sum('price');

        $salesPaidByCard = DB::table('orders')
            ->where('payment_status', 'Paid using card')
            ->sum('price');

        // Calculate the percentages
        $percentagePaidByCash = ($salesPaidByCash / $totalSales) * 100;
        $percentagePaidByCard = ($salesPaidByCard / $totalSales) * 100;

        $product = Product::all();
        $mostViewedProducts = Product::orderByDesc('views')->take(5)->get(); // Modify the limit as needed
        $productsWithZeroViews = Product::where('views', 0)->get();

                // Calculate the conversion rate
                $completedOrders = DB::table('orders')->count();
                $createdCarts = DB::table('carts')->whereNotNull('user_id')->count();
        
                // Avoid division by zero
                $conversionRate = ($createdCarts > 0) ? ($completedOrders / $createdCarts) * 100 : 0;
        
                // Find abandoned carts
                $abandonedCarts = DB::table('carts')->whereNull('user_id')->count();
}

            return view('admin.home', compact('total_product', 'total_order', 'total_customer', 'total_revenue', 'total_delivered', 'total_processing', 'topSellingProducts', 'mostProfitableCategories', 'retentionRate', 'churnRate', 'repeatCustomers', 'labels', 'data', 'userSegmentation', 'revenuePerMonth', 'totalSales', 'salesPaidByCash', 'salesPaidByCard','percentagePaidByCash', 'percentagePaidByCard', 'mostViewedProducts', 'productsWithZeroViews', 'abandonedCarts','conversionRate' ));
        }
        
        else
        {
            $product = Product::all();
            return view('home.userpage', compact('product'));
        }
    }



    public function product_details($id){

        

        $product=product::find($id);

        productviews::dispatch($product);
        return view('home.product_details', compact('product'));
    }

    public function add_cart(Request $request, $id){
        if(Auth::id()){

            $user=Auth::user();

            $product=product::find($id);

            $cart=new cart;

            $cart->name=$user->name;
            $cart->email=$user->email;
            $cart->phone=$user->phone;
            $cart->address=$user->address;
            $cart->user_id=$user->id;

            $cart->product_title=$product->title;

            if($product->discount_price!=null){
                $cart->price=$product->discount_price * $request->quantity;
            }

            else{
                $cart->price=$product->price * $request->quantity;
            }
            
            
            $cart->image=$product->image;
            $cart->product_id=$product->id;

            $cart->quantity=$request->quantity;

            $cart->save();

            Alert::success('Product Added Successfully.', 'Your Product has been Added to the Cart.');

            return redirect()->back();



            

            
        }
        else{
            return redirect('login');
        }
    }

    public function show_cart(){

        $id=Auth::user()->id;

        $cart=cart::where('user_id', '=', $id)->get();

        return view('home.showcart', compact('cart'));
    }



    public function remove_cart($id){
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();

    }

    public function cash_order(){

        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id', '=', $userid)->get();

        foreach($data as $data){
            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;

            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='cash on delivery';

            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();




        }

        return redirect()->back()->with('message', "Order recieved. We'll connect with you soon. ");

    }

    public function stripe($totalprice){
        return view('home.stripe', compact('totalprice'));
    }

    public function stripePost(Request $request, $totalprice)
    {

        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for Payment." 
        ]);


        $user=Auth::user();

        $userid=$user->id;

        $data=cart::where('user_id', '=', $userid)->get();

        foreach($data as $data){
            $order=new order;

            $order->name=$data->name;
            $order->email=$data->email;
            $order->phone=$data->phone;
            $order->address=$data->address;

            $order->user_id=$data->user_id;
            $order->product_title=$data->product_title;
            $order->price=$data->price;
            $order->quantity=$data->quantity;
            $order->image=$data->image;
            $order->product_id=$data->product_id;

            $order->payment_status='Paid using card';

            $order->delivery_status='processing';

            $order->save();

            $cart_id=$data->id;

            $cart=cart::find($cart_id);

            $cart->delete();




        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }


}
