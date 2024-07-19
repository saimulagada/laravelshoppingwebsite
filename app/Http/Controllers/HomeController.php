<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Orders;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin(){
        $user = User::where('usertype','user')->get()->count();
        $products = Products::all()->count();
        $orders = Orders::all()->count();
        $delivered = Orders::where('status','delivered')->get()->count();
        return view('admin.index',compact('user','products','orders','delivered'));
    }
    public function index(){
        $products = Products::all();
        if(Auth::id()){
            $userid = Auth::user();
            $user_id = $userid->id;
            $count = Cart::where('id',$user_id)->count();
        }
        else{
            $count = '';
        }
        $data = compact('products','count');

        return view('home.index')->with($data);
    }
    public function login_home(){
        $products = Products::all();
        if(Auth::id()){
            $userid = Auth::user();
            $user_id = $userid->id;
            $count = Cart::where('id',$user_id)->count();
        }
        else{
            $count = '';
        }
        $data = compact('products','count');

        return view('home.index')->with($data);
    }
    public function product_details($id){
         $data = Products::find($id);
         if(Auth::id()){
            $userid = Auth::user();
            $user_id = $userid->id;
            $count = Cart::where('id',$user_id)->count();
        }
        else{
            $count = '';
        }
        return view('home.product_details',compact('data','count'));
    }
    public function add_cart(Request $request,$id){
        // $product_id = $id;
        // $user = Auth::user();
        // $user_id = $user->id;
        // $cart = new Cart;
        // $cart->user_id = $user_id;
        // $cart->product_id = $product_id;
        // $cart->save();
        // toastr()->timeOut(10000)->closeButton()->success('Product Added to cart successfully');
        // return redirect()->back();
        if(Auth::id()){
            $user = auth()->user();
            $product = Products::find($id);
            $cart = new Cart;
            $cart->name = $user->name;
            $cart->number = $user->number;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->quantity = $product->quantity;
            $cart->price = $product->price;
            $cart->save();
            toastr()->timeOut(10000)->closeButton()->success('Product Added to cart successfully');

            return redirect()->back();
        }
        else{
            return redirect('login');
        }

    }
    public function mycart(){
        if(Auth::id()){
        $user = Auth::user();
        $userid= $user->id;
        $count = Cart::where('id',$userid)->count();
        $cart = Cart::where('id',$userid)->get();
        $products = Products::all();
        }
        return view('home.mycart',compact('count','cart','products'));
    }
    public function confirm_order(Request $request){
          $name = $request->name;
          $address = $request->address;
          $number = $request->number;

          $userid = Auth::user()->id;
          $cart = Cart::where('id',$userid)->get();

          foreach($cart as $carts){
            $order = new Orders;
            $order->name = $name;
            $order->rec_address = $address;
            $order->number = $number;
            $order->user_id = $userid;
            $order->product_id = $carts->id;
            $order->save();
           
          }

          $cart_remove = Cart::where('id',$userid)->get();

         foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
         }
         toastr()->timeOut(10000)->closeButton()->success('Product added to Orders successfully');
          return redirect()->back();
    }
    public function myorders(){

        $userid = Auth::user()->id;
        $count = Cart::where('id',$userid)->get()->count();
        $products = Products::all();
        return view('home.myorders',compact('count','products'));
    }
}
