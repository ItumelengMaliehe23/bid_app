<?php

namespace App\Http\Controllers;
use App\User;
use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        $products = Product::all();
        return view('cart.index', compact('products'))->with('carts', $user->carts);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
            'product_name' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
          
        ]);

        // Create product
        $cart = new Cart;
        $cart->product_id = $request->input('product_id');
        $cart->product_name = $request->input('product_name');
        $cart->user_id = auth()->user()->id;
        $cart->quantity = $request->input('quantity');
        $cart->total_price = $request->input('total_price');

     
        $cart->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        
        //Check if post exists before deleting
        if (!isset($cart)){
            return redirect('/cart')->with('error', 'No Record Found');
        }

        // Check for correct user
        if(auth()->user()->id !==$cart->user_id){
            return redirect('/cart')->with('error', 'Unauthorized Page');
        }
        
        $cart->delete();
        return redirect('/cart')->with('success', 'Product Removed');
    }
}
