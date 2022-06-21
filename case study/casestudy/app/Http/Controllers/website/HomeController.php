<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\admin\CustomerModel;
use App\Models\admin\ProductModel;
use App\Models\Cart;
// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
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
        return view('website.index', compact('products'));
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
        return view('website.detail', compact('product'));
    }
    public function cart()
    {
        return view('website.cart');
    }
    public function addToCart(Request $request, $id)
    {
        $product = ProductModel::findOrFail($id);
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            // dd($cart[$id]);
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" =>1,
                "price" => $product->price,
                "image" => $product->image,
                "product" => $product->id, 
            ];
        }
        // dd($cart);

        // $total = $product->price*$product->quantity;
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
        return back();
    }

    public function updatecart(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    
    public function getCart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function remove(Request $request,$id)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            // dd($cart);
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            // session()->flash('success', 'Product removed successfully');
            return view('website.cart');
        }
    }

    public function destroy($id)
    {
        //
    }

    public function ordered(Request $request){
        $customer = new CustomerModel();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();
        Session::flash('success', 'Đã Đặt Hàng');
        return redirect()->route('home.cart');
    }

    public function cars(){
        $products = ProductModel::all();
        return view('website.car',compact('products'));
    }

}
