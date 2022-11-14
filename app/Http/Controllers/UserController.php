<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function index (){
        $layanan = DB::table('layanan')->get();
        return view('user.homeUser' , [
            "title" => "Home",
            "layanan" => $layanan,
        ]); 
    }

    public function cekstok () {
        $barang = DB::table('barang')
		->orderby('id' , 'desc')
		->paginate(9)->onEachSide(0);

        return view('user.cekStok', [
            "title" => "Cek Stok Obat",
            "barang" => $barang 
        ]);
    }

    public function tentangkami () {
        return view('user.tentangKami', [
            "title" => "Tentang Kami"
        ]);
    }

    public function kategori_barang() {
        $kategori = DB::table('kategori')->get();
        return view('user.kategori', [
            "title" => "Kategori",
            "kategori"=> $kategori
        ]);
    } 

    public function detail (Request $request) {
        $barang = DB::table('barang')->where('slug',$request->slug)->get();
        foreach ($barang as $key =>$product){
            $rekomendasi =  DB::table('barang')
            ->where('kategori',$product->kategori)
            ->where('slug', '!=', $request->slug)
            ->get();
        }
        // foreach ($rekomendasi as $key => $rekom){
        //     if ($rekom->slug == $request->slug){

        //     }
        // }
        return view('user.detail', [
            "title" => "Detail",
            "barang"=>$barang,
            "rekomendasi" =>$rekomendasi
        ]);
    }
    public function listKategori (Request $request) {
        $string1 = str_replace('-', ' ', $request->slug);
        $string = strtolower($string1);
        $barang = DB::table('barang')->where(strtolower('kategori'),$string)->paginate(9)->onEachSide(0);;
        $title =  ucwords($string1);
        return view('user.listKategori', [
            "title" => "Detail Kategori $title",
            "barang"=>$barang,
            "namaKategori" => $title
        ]);
    }

    public function cari(Request $request)
	{
	
		$cari = $request->cari;

		$barang = DB::table('barang')
		->where('nama','like',"%".$cari."%")
		->orwhere('kategori','like',"%".$cari."%")
		->orwhere('deskripsi','like',"%".$cari."%")
		->orderby('tanggal_edit' , 'desc')
		
		->paginate(10)->withQueryString()->onEachSide(0);

		return view('user.cekStok',[
        'barang' => $barang,
        "title" => "Cek Stok Obat",
        "query" => $cari
    ]);

	}


    // public function layanan(Request $request){

    //     $title = ucwords(str_replace( "-", " ", $request->slug));

    //     return view('user.layanan.detailLayanan', [
    //         "title" => $title,
    //     ]);
	// }
}
