<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
        public function view_category()
    {
        $usertype = optional(Auth::user())->status;
        
        if (Auth::id() && $usertype == 'admin') {
            return view('admin.category');
        }else {
            return redirect('login');
        }

        
    }

    public function add_category(Request $request)
    {
        Category::create([
            'category_name'=>$request->name,
        ]);
        
        return redirect()->back()->with('message','Category Adedd Successfully');
    }


    public function all_category()
    {
        $categories = Category::all();
        return view('admin.all_category' , compact('categories'));
    }


    public function delete_category($id)
    {
        Category::destroy($id);
        return redirect()->back()->with('message','Category Deleted Successfully');
    }
}
