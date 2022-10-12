<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index (){
        return view('dashboard.home'); 
    }
    public function inventory (){
        return view('dashboard.inventory'); 
    }
	public function laporan (){
        return view('dashboard.laporan'); 
    }

	public function kadaluarsa (){
        return view('dashboard.kadaluarsa' ); 
    }
	

}
