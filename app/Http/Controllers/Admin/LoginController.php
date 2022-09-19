<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.pages.login');
    }

    public function login(Request $request)
    {
        $authDetails = array(
            'email' => $request->email,
            'password' => $request->password
        );
        if (Auth::guard('web')->attempt($authDetails, $request->exists('remember'))) {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('admin.login.page')->withErrors(['E-posta yada Parola Hatalı']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.page');
    }
}
