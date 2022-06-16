<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\Register;
use App\Models\admin\LoginModel;
use Illuminate\Http\Request;
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
        if (Auth::guard('admin_login')->attempt($credentials)) {
            $admin = Auth::guard('admin_login')->user()->role;
            //    dd($admin);

            $request->session()->regenerate();
        
            if($admin == '1'){
                return redirect()->route('home');
            }else {
                return redirect()->route('home.index');
            }
            // return redirect()->route('home');
        }
            return back()->withErrors([
                'email' => 'Email hoặc mật khẩu không đúng',
            ]);
    }


    public function logout(Request $request)
    {
        $admin = Auth::guard('admin_login')->user()->role;
        Auth::guard('admin_login')->logout();
        if($admin == 1){
            return redirect('/');
        }else {
            return redirect()->route('homelogin');
        }
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
