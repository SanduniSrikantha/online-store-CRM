<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Product;

use App\Models\Cart;

use App\Models\Order;

use Illuminate\Support\Facades\DB;

use Session;

use Stripe;


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
}

            return view('admin.home', compact('total_product', 'total_order', 'total_customer', 'total_revenue', 'total_delivered', 'total_processing', 'topSellingProducts', 'mostProfitableCategories', 'retentionRate', 'churnRate', 'repeatCustomers', 'labels', 'data'));
        }
        
        else
        {
            $product = Product::all();
            return view('home.userpage', compact('product'));
        }
    }

    public function product_details($id){

        $product=product::find($id);
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
