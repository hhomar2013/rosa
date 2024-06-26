<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
          $this->middleware('auth:admin');
    }
    public function index()
    {
//        $user = auth()->guard('admin')->user();
//        dd($user);
        return view('admin.dashboard');
    }
    public function category()
    {
        return view('admin.categories.index');
    }
    public function employee(){
        return view('admin.employee.index');
    }
    public function bank()
    {
        return view('admin.bank.index');
    }

    public function pos(){
        return view('admin.pos.index');
    }

}
