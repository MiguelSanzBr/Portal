<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $r){
    dd($r->session('key'));  
      return view('home');
    }
}
