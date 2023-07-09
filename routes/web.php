<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $products = Product::orderByRaw('RAND()')->take(4)->get();
    // $product_regular = Product::orderByRaw('RAND()')->take(8)->get();
    $product_regular = Product::paginate(4);
    $products_count = Product::count();

    return view('home.index',compact('products','products_count','product_regular'));
})->name('home');

Route::get('/dashboard', function () {
    $count_product = Product::count();
    $count_category = Category::count();
    $count_users = User::count();
    $count_orders = Order::count();
    $count_delivered = Order::where('delivery_status','delivered')->get()->count();
    $count_processing = Order::where('delivery_status','processing')->get()->count();

    $users = User::all();

    $order = Order::all();

    $comments = Contact::paginate(5);


    $total_revenue = 0;
    $total_delivered_order = 0;
    $id = 1;

    foreach ($order as $order) {

        $total_revenue=$total_revenue + $order->price;
        if ($order->delivery_status == 'delivered') {
            $total_delivered_order = $total_delivered_order + $order->price ;
        };
        
    
    }

    return view('admin.home',compact('count_product','count_category','count_processing','id','count_delivered','count_users','count_orders','users','total_revenue','total_delivered_order','comments'));
})->middleware('auth','checklogin','verified')->name('dashboard');

Route::get('/cart', function () {
    return view('home.cart');
});




// contact
Route::get('contact',[ContactController::class,'index_contact']);
Route::post('contact/add_contact',[ContactController::class,'add_contact'])->name('add.contact');
Route::get('dashboard/all_contacts',[ContactController::class,'all_contacts'])->name('all.contacts');
Route::get('dashboard/contact/destroy/{id}', [ContactController::class,'contact_destroy'])->name('contact.destroy');

// categories
Route::get('view_category' , [CategoryController::class ,'view_category']);
Route::post('add_category' , [CategoryController::class ,'add_category']);
Route::get('all_category' , [CategoryController::class ,'all_category']);
Route::get('delete_category/{id}' , [CategoryController::class ,'delete_category']);


// product

Route::get('view_product' , [ProductController::class , 'view_product']);
Route::post('add_product' , [ProductController::class , 'add_product']);
Route::get('all_product' , [ProductController::class ,'all_product'])->name('all_product');
Route::get('delete_product/{id}' , [ProductController::class ,'delete_product']);
Route::get('update_product/{id}' , [ProductController::class ,'update_product']);
Route::post('edit_product/{id}' , [ProductController::class ,'edit_product']);

Route::get('product_details/{id}',[ProductController::class,'product_details']);

Route::get('menu',[ProductController::class,'show_all_products']);

// search
Route::get('product_search',[ProductController::class,'product_search']);


// search orders
Route::get('search_order',[OrderController::class,'search_order']);


// search products in dashboard
Route::get('search_product',[ProductController::class,'search_product']);


// show all orders
Route::get('order',[OrderController::class,'order'])->middleware('auth');

Route::get('delivered/{id}',[OrderController::class,'delivered']);


// delete users
Route::get('delete_user/{id}',[ContactController::class,'delete_user']);



// cart
Route::post('add_cart/{id}',[CartController::class,'add_cart']);
Route::get('show_cart',[CartController::class,'show_cart'])->middleware('auth');
Route::get('delete_cart/{id}' , [CartController::class ,'delete_cart']);
Route::post('cash_order',[CartController::class,'cash_order'])->middleware('verified');



// print pdf
Route::get('print_pdf/{id}',[OrderController::class,'print_pdf']);


// send email
Route::get('send_email/{id}',[OrderController::class,'send_email']);
Route::post('send_user_email/{id}',[OrderController::class,'send_user_email']);



// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });
