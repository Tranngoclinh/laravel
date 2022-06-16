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
        // dd(count($products));
        $search = $request->search;
        // $category = $request->category_id;
        $products = ProductModel::select('*');
        if ($search) {
            $products = $products->where('name', 'like', '%' . $search . '%')->orwhere('id', $search);
        }
        // if ($category) {
        //     $products = $products->where('category_id', 'like', '%' . $category . '%');
        // }
        $products = $products->paginate(5);

        // dd($products);
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
            return redirect()->route('product.index')->with('success', 'Thêm mới sản phẩm thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product.create')->with('error', 'Thêm mới sản phẩm không thành công');
        }
        //dung session de dua ra thong bao
        // Session::flash('success', 'Thêm mới thành công');
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
            //     //tạo file upload trong public để chạy ảnh
            //     $path               = 'upload';
            //     $get_name_image     = $get_image->getClientOriginalName(); //abc.jpg
            //     //explode "." [abc,jpg]
            //     $name_image         = current(explode('.', $get_name_image)); //trả về phần tử thứ 1 của mảng
            //     //getClientOriginalExtension: tạo đuôi ảnh
            //     $new_image          = $name_image . rand(0, 99) . '.' . $get_image->getClientOriginalExtension();
            //     //abc nối số ngẫu nhiên từ 0-99, nối "." ->đuôi file jpg
            //     $get_image->move($path, $new_image); //chuyển file ảnh tới thư mục
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
            Session::flash('success', 'Cập nhật sản phẩm thành công');
             return redirect()->route('product.index');
        
            // return redirect()->route('product.trashed')->with('success', 'Khôi phục' . ' ' . $products->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            Session::flash('error', 'Cập nhật sản phẩm không thành công');
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
        Session::flash('success', 'Xóa danh mục thành công');
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
            return redirect()->route('product.trashed')->with('success', 'Khôi phục' . ' ' . $products->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product.trashed')->with('error', 'Khôi phục' . ' ' . $products->name . ' ' .  'không thành công');
        }
        return view('admin.product.trash', compact('products'));
    }

    public function forceDelete($id)
    {
        $products = ProductModel::onlyTrashed()->findOrFail($id);
        try {
            $products->forceDelete();
            return redirect()->route('product.trashed')->with('success', 'Xóa' . ' ' . $products->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('product.trashed')->with('error', 'Xóa ' . ' ' . $products->name . ' ' .  'không thành công');
        }
        return view('admin.product.trash', compact('products'));
    }
}

