<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\admin\CustomerModel;
use App\Service\PostService;
use Exception;
use Illuminate\Http\Request;

class CustomerCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $postService;
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }
    public function index()
    {
        $customer = CustomerModel::all();
        return response()->json($customer,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostService $request)
    {
       $data = $request->only([
            'name',
            'age',
            'email',
            'phone',
            'address'
       ]);
        $result = ['status' => 404];
        try {   
            $result['data'] = $this->postService->savePostdata($data);
        }catch(\Exception $e){
            $return = [
                'error' => 'không thành công'
            ]; 
            return response()->json($return,$result['status']);

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = CustomerModel::find($id);
        return response()->json($customer,200);

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
        $customer = CustomerModel::find($id);
        $customer->name = $request->name;
        $customer->age = $request->age;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        try {
            $customer->update();
            return response()->json($customer,200);

        }catch(\Exception $e){
            $return = [
                'error' => 'không thành công'
            ]; 
            return response()->json($return,202);

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
        $customer = CustomerModel::find($id);
        try {
            $customer->delete();
            return response()->json($customer,204);
        }catch(\Exception $e){
            $return = [
                'error' => 'không thành công'
            ]; 
            return response()->json($return,202);

        }
    }
}
