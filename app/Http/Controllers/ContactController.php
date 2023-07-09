<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{

    public function index_contact()
    {

        return view('home.contact');
    }

    // store contact
    public function add_contact(Request $request)
    {
        $reserv = new Contact();
        if (Auth::user()) {
            $reserv->name = Auth::user()->name;
            $reserv->email = Auth::user()->email;
            $reserv->phone = $request->phone;
            $reserv->title = $request->title;
            
        }else {
            $reserv->name = $request->name;
            $reserv->email = $request->email;
            $reserv->phone = $request->phone;
            $reserv->title = $request->title;
            
        }
        
        $reserv->save();

        Toastr::success('Sent Succesfully','Success');

        return redirect()->back();
    }

    // show all contacts
    // public function all_contacts()
    // {
    //     $comments = Contact::all();

    //     return view('admin.home',compact('comments'));
    // }


    // delete contact
    public function contact_destroy($id)
    {
        Contact::destroy($id);

        return redirect()->back()->with('message','تمت الحذف بنجاح');
    }



    // delete user
    public function delete_user($id)
    {
        User::destroy($id);

        return redirect()->back()->with('message','User Deleted Successfully');
    }
}
