<?php

use Illuminate\Support\Facades\Route;
use App\Product;
use App\User;


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
    
        if(request()->has('product_category')){
            $products = Product::where('product_category', request('product_category'))->paginate(13)->appends('product_category', request('product_category'));
          }else if(request()->has('search')){
            $search = request()->get('search');
            $products = Product::where('product_name', 'like', '%'.$search.'%')->
            orWhere('product_category', 'like', '%'.$search.'%')->paginate(13);
          }else{
            $products = Product::orderBy('created_at','desc')->paginate(15);
          }

          if(Auth::check()){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
    
            return view('welcome', compact('products'))->with('carts', $user->carts);
         
        }else{
       
    
          return view('welcome', compact('products'));
        }
        
          
          
});

Auth::routes(['verify' => true]);

Route::resource('/profiles','ProfileController');
Route::resource('/products','ProductController');
Route::resource('/cart','CartController');

Route::get('/home', 'HomeController@index')->name('home');
