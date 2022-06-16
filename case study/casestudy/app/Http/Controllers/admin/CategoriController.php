<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\category\Add;
use App\Http\Requests\admin\category\Edit;
use App\Models\admin\CategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = CategoriModel::paginate(5);
        $search = $request->search;
        $categories = CategoriModel::select('*');
        if ($search) {
            $categories = $categories->where('name', 'like', '%' . $search . '%')->orwhere('id',$search);

        }
        $categories = $categories->paginate(5);
        return view('admin.categori.list', compact('categories','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Add $request)
    {
        $categori = new CategoriModel();
        $categori->name = $request->name;
        $categori->save();

        //dung session de dua ra thong bao
        Session::flash('success', 'Thêm mới thành công');
        //tao moi xong quay ve trang danh sach khach hang
        return redirect()->route('categori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori = CategoriModel::findOrFail($id);
        return view('admin.categori.edit',compact('categori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Edit $request, $id)
    {
        $categori = CategoriModel::findOrFail($id);
        $categori->name = $request->name;
        $categori->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        //cap nhat xong quay ve trang danh sach khach hang
        return redirect()->route('categori.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categori = CategoriModel::findOrFail($id);
        $categori->delete();
        //dung session de dua ra thong bao
        Session::flash('success', 'Xóa danh mục thành công');
        //xoa xong quay ve trang danh sach khach hang
        return redirect()->route('categori.index');
    }

    public function trashed(){
        $categories = CategoriModel::onlyTrashed()->get();
        return view('admin.categori.trash',compact('categories'));
    }

    public function restore($id){
        $categories = CategoriModel::withTrashed()->find($id);
        try {
            $categories->restore();
            return redirect()->route('categori.trashed')->with('success', 'Khôi phục' . ' ' . $categories->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categori.trashed')->with('error', 'Khôi phục' . ' ' . $categories->name . ' ' .  'không thành công');
        }
        return view('admin.categori.trash',compact('categories'));
    }

    public function forceDelete($id){
        $categories = CategoriModel::onlyTrashed()->findOrFail($id); 
        try {
            $categories->forceDelete();
            return redirect()->route('categori.trashed')->with('success', 'Xóa' . ' ' . $categories->name . ' ' .  'thành công');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->route('categori.trashed')->with('error', 'Xóa ' . ' ' . $categories->name . ' ' .  'không thành công');
        }
        return view('admin.categori.trash',compact('categories'));
    }
}
