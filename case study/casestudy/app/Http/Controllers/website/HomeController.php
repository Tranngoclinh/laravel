<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\ProductModel;
use App\Models\Cart;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::all();
        // dd($products);
        return view('website.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $product = ProductModel::findOrFail($id);
        // dd($products);
        return view('website.detail',compact('product'));
    }

    public function addToCart(Request $request, $id)
{
   $product = ProductModel::findOrFail($id);
   dd($product);
   $oldCart = $request->session()->get('cart');
   $newCart = new Cart($oldCart);
   $newCart->add($product);
   $request->session()->put('cart', $newCart);
   $request->session()->flash('success', 'Them sp vao gio hang thang cong');
   return back();
}

public function getCart(Request $request)
{
   $cart = $request->session()->get('cart');
   return view('website.cart', compact('cart'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
