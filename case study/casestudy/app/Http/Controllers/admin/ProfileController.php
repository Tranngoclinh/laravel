<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\ProfileModel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        ProfileModel::all();
        
    } 
}
