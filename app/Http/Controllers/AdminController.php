<?php

namespace App\Http\Controllers;

use App\Events\LoginEvent;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;


class AdminController extends Controller
{
    public function view_category()
    {

        $data=category::all();


        return view('admin.category',compact('data'));
    }



    public function add_category(Request $request)
    {
        $data=new category;

        $data->category_name=$request->category;

        $data->save();

        return redirect()->back()->with('message','Category Added Successfully');

    }

    public function delete_category($id){
        $data=category::find($id);
        $data->delete();

        return redirect()->back()->with('message', 'Category Deleted Successfully');

    }

    public function view_product(){
        $category = category::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(Request $request){

        $product=new product;

        $product->title=$request->title; 

        $product->description=$request->description;

        $product->quantity=$request->quantity;

        $product->price=$request->price;

        $product->discount_price=$request->dis_price; 

        $product->category=$request->category;
    


        $image=$request->image; //

        $imagename=time().'.'.$image->getClientOriginalExtension();

        $request->image->move('product',$imagename);

        $product->image=$imagename;



        $product->save();

        

        return redirect()->back()->with('message', 'Product Added Successfully');
    }

    public function show_product(){


        $product=product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id){
        $product=product::find($id);

        $product->delete();

        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }

    public function update_product($id){

        $product=product::find($id);

        $category=category::all();

        return view('admin.update_product',compact('product','category'));
    }

    public function update_product_confirm(Request $request, $id){

        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->quantity=$request->quantity;
        $product->price=$request->price;
        $product->discount_price=$request->dis_price;
        $product->category=$request->category;

        $image=$request->image;

        if($image){

            $imagename=time().'.'.$image->getClientOriginalExtension();

            $request->image->move('product',$imagename);
    
            $product->image=$imagename;

        }



        $product->save();


        return redirect()->back()->with('message','Product Updated Successfully');



    }

    public function order(){

        $order=order::all();



        return view('admin.order', compact('order'));
    }

    public function delivered($id){
        $order=order::find($id);
        $order->delivery_status="delivered";
        //$order->payment_status="Paid";
        $order->save();

        return redirect()->back();

    }

    public function view_user(){
        return view('admin.user');
    }

    public function add_user(Request $request){
        $user=new user;

        $user->name=$request->Username;
        $user->email=$request->Email;
        $user->usertype=$request->Usertype;
        $user->phone=$request->Phone;
        $user->address=$request->Address;
        $user->password=$request->Password;

        $user->save();

        return redirect()->back();



    }

    public function show_user(){

        $user=user::all();
        return view('admin.show_user',compact('user'));

    }

    public function stocks(){

        $product=product::all();
        return view('admin.stocks', compact('product'));
    }

    public function user_analytics(){

        $user=user::all();
        return view('admin.user_analytics',compact('user'));

    }

}


