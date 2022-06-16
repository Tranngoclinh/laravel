<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\Register;
use App\Models\admin\LoginModel;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('website.auth.login');
    }

    public function adminlogin(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
     //   dd($credentials);
    // $admin = Auth::guard('admin_login')->user()->name;
        if (Auth::guard('admin_login')->attempt($credentials)) {

            $request->session()->regenerate();
            // dd('đăng nhập thành công');
            
            return redirect()->route('home');
        }
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng',
            ]);
    }


    public function logout(Request $request)
    {
        Auth::guard('admin_login')->logout();
        return redirect('/');
    }
    
    public function register(Register $request)
    {
        $admin = new LoginModel();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->route('login')->with('success', 'Đăng kí thành công');
    }
}
