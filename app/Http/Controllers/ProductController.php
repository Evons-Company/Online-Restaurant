<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // product

    public function view_product()
    {
        $usertype = optional(Auth::user())->status;

        if (Auth::id() && $usertype == 'admin') {
            $categories = Category::all();
            return view('admin.product' , compact('categories'));
        }else {
            return redirect('login');
        }

    }


    public function add_product(Request $request)
    {
            $product = new Product();
            $product->title=$request->title;
            $product->description=$request->description;
            $product->category=$request->category;
            // $product->quantity=$request->quantity;
            $product->price=$request->price;
            // $product->discount_price=$request->dis_price;
            $image=$request->image;
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
            $product->save();


        
            return redirect()->back()->with('message','Product Added Successfully');
    }

    // show all product in dashboard
    public function all_product()
    {
        $products = Product::all();
        return view('admin.all_product' , compact('products'));
    }


    public function delete_product($id)
    {
        Product::destroy($id);
        return redirect()->back()->with('message','Product Deleted Successfully');
    }


    public function update_product($id)
    {
        $categories = Category::all();
        $product = Product::find($id);
        return view('admin.update__product' , compact('product','categories'));
    }


    public function edit_product(Request $request, $id)
    {

            $product = Product::find($id);
            $product->title=$request->title;
            $product->description=$request->description;
            $product->category=$request->category;
            // $product->quantity=$request->quantity;
            $product->price=$request->price;
            // $product->discount_price=$request->dis_price;
            $image=$request->image;
            if ($image) {
                $imagename=time().'.'.$image->getClientOriginalExtension();
                $request->image->move('product',$imagename);
                $product->image=$imagename;
            }

            $product->save();
            return redirect()->route('all_product')->with('message','Product updated Successfully');
    }


    
    // search for products
    public function product_search(Request $request)
    {
        
        $searchText = $request->search;
        $products = Product::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"%$searchText%")->paginate(8);

        return view('home.search_product',compact('products'));
    }



    // show all products in menu
    public function show_all_products()
    {
        $products = Product::paginate(12);
        return view('home.menu',compact('products'));
    }


    // search for products in dashboard
    public function search_product(Request $request)
    {
        
        // $comments = Comment::all();

        $searchText = $request->search;
        $products = Product::where('title','LIKE',"%$searchText%")->orWhere('category','LIKE',"%$searchText%")->paginate(5);

        return view('admin.all_product',compact('products'));
    }

}
