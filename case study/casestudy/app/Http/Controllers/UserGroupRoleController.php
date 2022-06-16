<?php

namespace App\Http\Controllers;

use App\Models\UserGroupRole;
use App\Http\Requests\StoreUserGroupRoleRequest;
use App\Http\Requests\UpdateUserGroupRoleRequest;

class UserGroupRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreUserGroupRoleRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserGroupRoleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserGroupRole  $userGroupRole
     * @return \Illuminate\Http\Response
     */
    public function show(UserGroupRole $userGroupRole)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserGroupRole  $userGroupRole
     * @return \Illuminate\Http\Response
     */
    public function edit(UserGroupRole $userGroupRole)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUserGroupRoleRequest  $request
     * @param  \App\Models\UserGroupRole  $userGroupRole
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserGroupRoleRequest $request, UserGroupRole $userGroupRole)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserGroupRole  $userGroupRole
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserGroupRole $userGroupRole)
    {
        //
    }
}
