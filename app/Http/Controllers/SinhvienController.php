<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinhvienController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:sinhvien');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home_sv');
    }
}
