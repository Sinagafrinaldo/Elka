<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

    public function index (){
        return view('dashboard.home' , [
            "title" => "dashboard"
        ]); 
    }
    public function inventory (){
        return view('dashboard.inventory', [
            "title" => "inventory"
        ]); 
    }
    public function daftarObat (){
        $barang = DB::table('barang')
		->orderby('id' , 'desc')
		->paginate(10)->onEachSide(0);

        return view('dashboard.inventori.daftarObat', [
            "title" => "Daftar Obat",
            "barang" => $barang
        ]); 
    }
    public function inputTransaksi (){
        return view('dashboard.inventori.inputTransaksi', [
            "title" => "Input Transaksi"
        ]); 
    }
    public function inputObat (){
        return view('dashboard.inventori.tambahObat', [
            "title" => "Input Obat"
        ]); 
    }

	public function laporan_barangmasuk (){
        return view('dashboard.laporanScreen.barangmasuk', [
            "title" => "Laporan Barang Masuk",
        ]); 
    }
    public function laporan_barangsisa (){
        return view('dashboard.laporanScreen.barangsisa', [
            "title" => "Laporan Barang Sisa"
        ]); 
    }
    public function laporan_penjualan (){
        return view('dashboard.laporanScreen.penjualan', [
            "title" => "Laporan Penjualan"
        ]); 
    }
    public function laporan_pemasukan (){
        return view('dashboard.laporanScreen.pemasukan', [
            "title" => "Laporan Pemasukan"
        ]); 
    }

	public function kadaluarsa (){
        return view('dashboard.kadaluarsa',[
            "title" => "Kadaluarsa"
        ]); 
    }

    public function kategori (){
        return view('dashboard.kategori.home',[
            "title" => "Kategori"
        ]); 
    }

    public function inputKategori (){
        return view('dashboard.kategori.input',[
            "title" => "Tambah Kategori"
        ]); 
    }

    public function editKategori (){
        return view('dashboard.kategori.edit',[
            "title" => "Edit Kategori"
        ]); 
    }


    public function store(Request $request)
	{
		$this->validate($request, rules:[
			'nama' => 'required',
			'jumlah' => 'required',
			'minimal'=> 'required',
            'maksimal'=> 'required',
            'kadaluarsa'=> 'required',
            'deskripsi'=> 'required',
            'kategori'=> 'required',
			'image' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg'

		]);
		$img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $name =  $request->image->getClientOriginalName();
        $path = public_path('uploads');
        $img->move($path, $name);
		$content = $request->input('deskripsi');
		$slug =  Str::slug($request->nama,"-");
		DB::table('barang')->insert([
			'nama' => $request->nama,
			'kategori' => $request->kategori,
			'deskripsi' => $content,
            'sisa' =>$request->jumlah,
            'minimal' =>$request->minimal,
            'maksimal' =>$request->maksimal,
            'kadaluarsa' =>$request->kadaluarsa,
            'deskripsi' =>$request->deskripsi,
			'image' =>$name,
			'slug' =>$slug
		]);
		return redirect('/admin/daftar-obat');
	
	}
    public function detail(Request $request)
	{
	$barang = DB::table('barang')->where('slug',$request->slug)->get();
		return view('dashboard.inventori.detailObat',[
            'barang' => $barang,
            "title" => "Detail Obat"
        ]);
	}

    public function edit(Request $request)
	{
	$barang = DB::table('barang')->where('slug',$request->slug)->get();
		return view('dashboard.inventori.editObat',[
            'barang' => $barang,
            "title" => "Edit Obat"
        ]);
	}
	

}
