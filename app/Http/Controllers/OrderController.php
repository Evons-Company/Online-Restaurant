<?php

namespace App\Http\Controllers;

use App\Models\Order;
use PDF;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;


class OrderController extends Controller
{
    public function order()
    {
        $orders = Order::paginate(10);
        // $orders_pag = Order::paginate(4);

        return view('admin.order',compact('orders'));
    }


    public function delivered($id)
    {
        $order = Order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status="Paid";
        $order->save();
        return redirect()->back();
    }


    // print pdf
    public function print_pdf($id)
    {
        $order = Order::find($id);
        $pdf = PDF::loadView('admin.pdf', compact('order'));

        return $pdf->download($order->name . '-' . $order->created_at . '-' .  'order_details.pdf');
    }



    // send email
    public function send_email($id)
    {
        $order = Order::find($id);
        return view('admin.email_info',compact('order'));
    }


    public function send_user_email(Request $request , $id)
    {
        $order = order::find($id);

        $details = [

            'greeting'=>$request->greeting,
            'firstline'=>$request->firstline,
            'body'=>$request->body,
            'button'=>$request->button,
            'url'=>$request->url,
            'lastline'=>$request->lastline,

        ];

        Notification::send($order,new SendEmailNotification($details));

        return redirect()->back()->with('message','Message sent Successfully');
    }

        // search for orders
        public function search_order(Request $request)
        {
            
            $searchText = $request->search;
            $orders = Order::where('name','LIKE',"%$searchText%")->orWhere('user_id','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->paginate(8);
    
            return view('admin.order',compact('orders'));
        }
}
