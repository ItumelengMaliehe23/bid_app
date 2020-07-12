<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        return view('products.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products/create');
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
            'product_name' => 'required',
            'product_category' => 'required',
            'product_disc' => 'required',
            'product_img_1' => 'image|nullable|max:1999|required',
            'product_img_2' => 'image|nullable|max:1999',
            'product_price' => 'required',
        ]);

        // Handle File Upload
        if($request->hasFile('product_img_1')){
            // Get filename with the extension
            $filenameWithExt = $request->file('product_img_1')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('product_img_1')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('product_img_1')->storeAs('public/product_imgs', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        if($request->hasFile('product_img_2')){
            // Get filename with the extension
            $filenameWithExtb = $request->file('product_img_2')->getClientOriginalName();
            // Get just filename
            $filenameb = pathinfo($filenameWithExtb, PATHINFO_FILENAME);
            // Get just ext
            $extensionb = $request->file('product_img_2')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStoreb= $filenameb.'_'.time().'.'.$extensionb;
            // Upload Image
            $pathb = $request->file('product_img_2')->storeAs('public/product_imgs', $fileNameToStoreb);
        } else {
            $fileNameToStoreb = 'noimage.jpg';
        }




        // Create product
        $product = new Product;
        $product->product_name = $request->input('product_name');
        $product->product_category = $request->input('product_category');
        $product->product_disc = $request->input('product_disc');
        $product->user_id = auth()->user()->id;
        $product->product_price = $request->input('product_price');
        $product->product_img_1 = $fileNameToStore;
        $product->product_img_2 = $fileNameToStoreb;
     
       
        
        $product->save();

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return redirect('/home')->with('success', 'product Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::check()){
            $user_id = auth()->user()->id;
            $user = User::find($user_id);
    
            $product = Product::find($id);
            return view('products.show')->with('product', $product)->with('carts', $user->carts);
        }else{
       
    
            $product = Product::find($id);
            return view('products.show')->with('product', $product);
        }
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        
    }
}
