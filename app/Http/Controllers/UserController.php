<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index (){
        return view('user.homeUser' , [
            "title" => "Home"
        ]); 
    }

    public function cekstok () {
        return view('user.cekStok', [
            "title" => "Cek Stok Obat"
        ]);
    }

    public function tentangkami () {
        return view('user.tentangKami', [
            "title" => "Tentang Kami"
        ]);
    }

    public function kategori () {
        return view('user.kategori', [
            "title" => "Kategori"
        ]);
    }

    public function detail () {
        return view('user.detail', [
            "title" => "Detail"
        ]);
    }
}
