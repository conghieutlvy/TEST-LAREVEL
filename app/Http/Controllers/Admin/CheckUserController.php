<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckUserController extends Controller
{
    public function getLogin() {
        return view('login');
    }
 
    public function postLogin(Request $request) {
        if(Auth::attempt(['username' => $request->txtUsername, 'password' => $request->txtPassword])) {
            return redirect('AdminLTE/index');
        }else {
            return view('login');
        }
    }
 
    public function logout() {
        Auth::logout();
        return view('login');
    }
}
