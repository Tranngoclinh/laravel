<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\product\add;
use App\Http\Requests\admin\product\edit;
use App\Models\admin\CategoriModel;
use App\Models\admin\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = ProductModel::paginate(5);
        // dd($products);
        $search = $request->search;
        $products = ProductModel::select('*');
        if ($search) {
            $products = $products->where('name', 'like', '%' . $search . '%')->orwhere('id', $search);
        }
        $products = $products->paginate(5);
        return view('admin.product.list', compact('products', 'search'));
    }

    // public function display(Request $request){
    //     $products = ProductModel::paginate(5);
    //     // dd(count($products));
        
    //     // dd($category);
    //     $products = ProductModel::select('*');
       
    //     $products = $products->paginate(5);
    //     // dd($products);
    //     return view('admin.product.list',compact('products','category'));
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = CategoriModel::all();
        $params = ['products' => $products];
        return view('admin.product.create', compact('products', 'params'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(add $request)
    {
        $product = new ProductModel();
        // dd($request->image);
        if ($request->hasFile('image')) {
            $get_file = $request->image;
            $get_name_file = $get_file->getClientOriginalName();
            $name_file = current(explode('.', $get_name_file));
            $new_file = $name_file . rand(0, 99) . '.' . $get_file->getClientOriginalExtension();
            $get_file->move(public_path('upload'), $new_file);
            $product->image = $new_file;
        }    
        
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        // $product->image = $request->image;
        $product->description = $request->description;
        try {
            $product->save();
            return redirect()->route('product.index')->with('success', 'Th??m m???i s???n ph???m th??nh c??ng');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product.create')->with('error', 'Th??m m???i s???n ph???m kh??ng th??nh c??ng');
        }
        //dung session de dua ra thong bao
        // Session::flash('success', 'Th??m m???i th??nh c??ng');
        //tao moi xong quay ve trang danh sach khach hang
        // return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = ProductModel::findOrFail($id);
        // $category = CategoriModel::all();
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = ProductModel::findOrFail($id);
        $categories = CategoriModel::all();
        // dd($product);
        return view('admin.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(edit $request, $id)
    {
        $product = ProductModel::findOrFail($id);
        try {
            // if ($request->hasFile('image')) {
            //     $get_image          = $request->image;
            //     //t???o file upload trong public ????? ch???y ???nh
            //     $path               = 'upload';
            //     $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg
            //     //explode "." [abc,jpg]
            //     $name_image         = current(explode('.', $get_name_image)); //tr??? v??? ph???n t??? th??? 1 c???a m???ng
            //     //getClientOriginalExtension: t???o ??u??i ???nh
            //     $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //     //abc n???i s??? ng???u nhi??n t??? 0-99, n???i "." ->??u??i file jpg
            //     $get_image->move($path, $new_image); //chuy???n file ???nh t???i th?? m???c
            //     $product->image   = $new_image;
            
            if ($request->hasFile('image')) {
                $get_file = $request->image;
                
                $get_name_file = $get_file->getClientOriginalName();
                $name_file = current(explode('.', $get_name_file));
                $new_file = $name_file . rand(0, 99) . '.' . $get_file->getClientOriginalExtension();
                $get_file->move(public_path('upload'), $new_file);
                $product->image = $new_file;
            }
            
            
            $product->name = $request->name;
            $product->price = $request->price;
            $product->quantity = $request->quantity;
            $product->description = $request->description;
            $product->category_id = $request->category_id;
            $product->save();
            Session::flash('success', 'C???p nh???t s???n ph???m th??nh c??ng');
             return redirect()->route('product.index');
        
            // return redirect()->route('product.trashed')->with('success', 'Kh??i ph???c' . ' ' . $products->name . ' ' .  'th??nh c??ng');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'C???p nh???t s???n ph???m kh??ng th??nh c??ng');
            return redirect()->route('product.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = ProductModel::findOrFail($id);
        $product->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'X??a danh m???c th??nh c??ng');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('product.index');
    }

    public function trashed()
    {
        $products = ProductModel::onlyTrashed()->get();
        return view('admin.product.trash', compact('products'));
    }

    public function restore($id)
    {
        $products = ProductModel::withTrashed()->find($id);
        try {
            $products->restore();
            return redirect()->route('product.trashed')->with('success', 'Kh??i ph???c' . ' ' . $products->name . ' ' .  'th??nh c??ng');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product.trashed')->with('error', 'Kh??i ph???c' . ' ' . $products->name . ' ' .  'kh??ng th??nh c??ng');
        }
        return view('admin.product.trash', compact('products'));
    }

    public function forceDelete($id)
    {
        $products = ProductModel::onlyTrashed()->findOrFail($id);
        try {
            $products->forceDelete();
            return redirect()->route('product.trashed')->with('success', 'X??a' . ' ' . $products->name . ' ' .  'th??nh c??ng');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product.trashed')->with('error', 'X??a ' . ' ' . $products->name . ' ' .  'kh??ng th??nh c??ng');
        }
        return view('admin.product.trash', compact('products'));
    }
}

