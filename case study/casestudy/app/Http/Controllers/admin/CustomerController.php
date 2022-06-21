<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\customer\add;
use App\Http\Requests\admin\customer\edit;
use App\Http\Requests\admin\product\add as ProductAdd;
use App\Models\admin\CustomerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = CustomerModel::paginate(10);
        $search = $request->search;
        // dd($search);
        $customers = CustomerModel::select('*');
        if ($search) {
            $customers = $customers->where('name', 'like', '%' . $search . '%');
        }
        $customers = $customers->paginate(10);
        return view('admin.customers.list',compact('customers','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(add $request)
    {
        $customer = new CustomerModel();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->address = $request->address;
        $customer->phone = $request->phone;
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Tạo mới khách hàng thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('customer.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = CustomerModel::findOrFail($id);
        return view('admin.customers.show',compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = CustomerModel::findOrFail($id);
        return view('admin.customers.edit',compact('customer'));
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
        $customer = CustomerModel::findOrFail($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Cập nhật khách hàng thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('customer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = CustomerModel::findOrFail($id);
        $customer->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa khách hàng thành công');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('customer.index');
    }
    public function trashed(){
        $customers = CustomerModel::onlyTrashed()->get();
        return view('admin.customers.trash',compact('customers'));
    }

    public function restore($id){
        $customers = CustomerModel::withTrashed()->find($id);
        try {
            $customers->restore();
            return redirect()->route('customer.trashed')->with('success', 'Khôi phục' . ' ' . $customers->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customer.trashed')->with('error', 'Khôi phục' . ' ' . $customers->name . ' ' .  'không thành công');
        }
        return view('admin.customers.trash',compact('customers'));
    }

    public function forceDelete($id){
        $customers = CustomerModel::onlyTrashed()->findOrFail($id); 
        try {
            $customers->forceDelete();
            return redirect()->route('customer.trashed')->with('success', 'Xóa' . ' ' . $customers->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('customer.trashed')->with('error', 'Xóa ' . ' ' . $customers->name . ' ' .  'không thành công');
        }
        return view('admin.customers.trash',compact('customers'));
    }
}
