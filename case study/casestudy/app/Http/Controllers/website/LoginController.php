<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register;
use App\Models\admin\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
   public function login(){
    return view('admin.auth.login');
   }

   public function postlogin(Request $request){
    $credentials = [
        'email' => $request->email,
        'password' => $request->password,
    ];
   dd($credentials);
    if (Auth::guard('carshop')->attempt($credentials)) {

        $request->session()->regenerate();
        // dd('đăng nhập thành công');
        return redirect('carshop/home');
    }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng',
        ]);
   }

   public function register(Register $request)
    {
        $admin = new LoginModel();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('loginshop')->with('success', 'Đăng kí thành công');
    }
}