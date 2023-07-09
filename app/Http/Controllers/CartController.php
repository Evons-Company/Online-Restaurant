<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {
            

            $user = Auth::user();
            $userid = $user->id;
            $product = Product::find($id);

            $product_exist_id = Cart::where('product_id',$id)->where('user_id',$userid)->get('id')->first();

            if ($product_exist_id) {
                
                $cart = Cart::find($product_exist_id)->first();
                $quantity = $cart->quantity;
                $cart->quantity = $quantity + $request->quantity;

                $cart->total_price=$product->price * $cart->quantity;
                $cart->price=$product->price;

                $cart->save();
                return redirect()->back();


            }else {
                $cart = new Cart();
                $cart->name=$user->name;
                $cart->email=$user->email;
                $cart->phone=$user->phone;
                $cart->address=$user->address;
                $cart->user_id=$user->id;
                $cart->product_title=$product->title;

                $cart->total_price=$product->price * $request->quantity;
                $cart->price=$product->price;

                $cart->image=$product->image;
                $cart->product_id=$product->id;
                $cart->quantity=$request->quantity;
                // dd($cart);
                $cart->save();

                Toastr::success('Product Added Successfully , We have added product to the cart','Success');
                // Alert::success('Product Added Successfully','We have added product to the cart');


                return redirect()->back();
                }
                

        }else {
            return redirect('login');
        }
    }



    public function show_cart()
    {

        if (Auth::id()) {
        $id = Auth::user()->id;
        $carts = Cart::where('user_id',$id)->get();
        return view('home.cart',compact('carts'));

        }else {
            return redirect('login');
        }

        
    }


    public function delete_cart($id)
    {
        Cart::destroy($id);
        Toastr::success('Product Deleted Successfully','Success');

        return redirect()->back();

    }


    public function cash_order(Request $request)
    {
        $user = Auth::user();
        $userid = $user->id;

        $data = Cart::where('user_id',$userid)->get();

        foreach ($data as $data) {
            $order = new Order();

            $order->name = $request->name;
            $order->email = $data->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->user_id = $data->user_id;
            
            $order->product_title = $data->product_title;
            $order->price = $data->total_price;
            $order->guantity = $data->quantity;
            $order->image = $data->image;
            $order->product_id = $data->product_id;

            $order->payment_status = 'Pay cash on Delivery';
            $order->delivery_status = 'processing';
            // dd($order);
            $order->save();

            // حذف البيانات من السلة بعد حفظها في الاوردر

            $cart_id = $data->id;
            $cart = Cart::find($cart_id);
            $cart->delete();

        }

        Toastr::success('We have Received Your Order. We will connect with you soon...','Success');

        return redirect()->back();

    }
}
