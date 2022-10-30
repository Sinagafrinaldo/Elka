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
        $jumlah = DB::table('barang')->count();
        $kategori = DB::table('kategori')->count();
        return view('dashboard.home' , [
            "title" => "dashboard",
            "jumlah"=>$jumlah,
            "kategori"=>$kategori
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

        $kategori = DB::table('kategori')->get();
        return view('dashboard.inventori.daftarObat', [
            "title" => "Daftar Obat",
            "barang" => $barang,
            "kategori"=>$kategori
        ]); 
    }
    public function inputTransaksi (){
        return view('dashboard.inventori.inputTransaksi', [
            "title" => "Input Transaksi"
        ]); 
    }
    public function inputObat (){
        $kategori = DB::table('kategori')->get();

        return view('dashboard.inventori.tambahObat', [
            "title" => "Input Obat",
            "kategori" => $kategori
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
        $kategori = DB::table('kategori')
		->orderby('id' , 'desc')
		->paginate(8)->onEachSide(0);

        return view('dashboard.kategori.home',[
            "title" => "Kategori",
            "kategori" => $kategori
        ]); 
    }

    public function inputKategori (){
        return view('dashboard.kategori.input',[
            "title" => "Tambah Kategori"
        ]); 
    }

    public function editKategori (Request $request){
        $kategori = DB::table('kategori')->where('slug',$request->slug)->get();
		return view('dashboard.kategori.edit',[
            'kategori' => $kategori,
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
			'image' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg',
            'harga' =>'required'

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
			'image' =>$name,
			'slug' =>$slug,
            'harga' =>$request->harga,
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
    $kategori = DB::table('kategori')->get();
	$barang = DB::table('barang')->where('slug',$request->slug)->get();
		return view('dashboard.inventori.editObat',[
            'barang' => $barang,
            "title" => "Edit Obat",
            'kategori' => $kategori
        ]);
	}

    
    public function tambahKategori(Request $request)
	{
		$this->validate($request, rules:[
			'nama' => 'required',
			'image' => 'required|mimes:jpg,jpeg,png,bmp,gif,svg,jfif'

		]);
		$img = $request->file('image');
        $ext = $img->getClientOriginalExtension();
        $name =  $request->image->getClientOriginalName();
        $path = public_path('kategori');
        $img->move($path, $name);
        $slug =  Str::slug($request->nama,"-");
		DB::table('kategori')->insert([
			'nama' => $request->nama,
			'gambar' =>$name,
            'slug' =>$slug
		]);
		return redirect('/admin/kategori');
	
	}

    public function updateKategori(Request $request)
	{

	
	$this->validate($request, rules:[
			'nama' => 'required',
			'image' => 'image|mimes:jpg,jpeg,png,bmp,gif,svg'
	]);
    $slug =  Str::slug($request->nama,"-");

	if($request->hasFile('image')){
		$img = $request->file('image');
		$ext = $img->getClientOriginalExtension();
		$name =  $request->image->getClientOriginalName();
		$path = public_path('kategori');
		$img->move($path, $name);
		DB::table('kategori')->where('id',$request->id)->update([
			'nama' => $request->nama,
			'gambar' =>$name,
            'slug'=> $slug
		]);
	}else{
	DB::table('kategori')->where('id',$request->id)->update([
        'nama' => $request->nama,
        'slug'=> $slug
		]);
	}

		return redirect('/admin/kategori');
	}
	public function hapusKategori($id)
	{
	
		DB::table('kategori')->where('id',$id)->delete();
        return redirect('/admin/kategori' ); 
	}

    public function updateBarang(Request $request)
	{
        date_default_timezone_set('Asia/Jakarta');   
        $time = date("Y-m-d H:i:s", time()); 

        $this->validate($request, rules:[
			'nama' => 'required',
			'jumlah' => 'required',
			'minimal'=> 'required',
            'maksimal'=> 'required',
            'kadaluarsa'=> 'required',
            'harga'=> 'required',
            'deskripsi'=> 'required',
            'kategori'=> 'required',

		]);
		$content = $request->input('deskripsi');
		$slug =  Str::slug($request->nama,"-");
        if($request->hasFile('image')){
            $img = $request->file('image');
            $ext = $img->getClientOriginalExtension();
            $name =  $request->image->getClientOriginalName();
            $path = public_path('uploads');
            $img->move($path, $name);
            DB::table('barang')->where('id',$request->id)->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $content,
                'sisa' =>$request->jumlah,
                'minimal' =>$request->minimal,
                'maksimal' =>$request->maksimal,
                'kadaluarsa' =>$request->kadaluarsa,
                'image' =>$name,
                'slug' =>$slug,
                'harga' =>$request->harga,
                'tanggal_edit'=> $time
            ]);
        }else{
            DB::table('barang')->where('id',$request->id)->update([
                'nama' => $request->nama,
                'kategori' => $request->kategori,
                'deskripsi' => $content,
                'sisa' =>$request->jumlah,
                'minimal' =>$request->minimal,
                'maksimal' =>$request->maksimal,
                'kadaluarsa' =>$request->kadaluarsa,
                'slug' =>$slug,
                'harga' =>$request->harga,
                'tanggal_edit'=> $time
            ]);
        }

		return redirect('/admin/daftar-obat');
	}
    public function hapusBarang($id)
	{
	
		DB::table('barang')->where('id',$id)->delete();
        return redirect('/admin/daftar-obat' ); 
	}

    public function search(Request $request)
    {
        if($request->ajax()){
                $a = 1;
                $output="";
                $products=DB::table('barang')
                ->where('nama','LIKE','%'.$request->search."%")
                ->orwhere('kategori','LIKE','%'.$request->search."%")
                ->get();
            
                if ($products->isEmpty()){
                    $products=DB::table('barang') ->get();
                }
                if($products){
                    foreach ($products as $key => $product) {
            
                    $output.='<tr>'.
                    '<td>'.$a.'</td>'.
                    '<td>'.$product->id.'</td>'.
                    '<td>'.$product->nama.'</td>'.
                    '<td>'.$product->kategori.'</td>'.
                    '<td>'.$product->sisa.'</td>'.
                    '<td>
                        <a href="/admin/edit-barang/'. $product->slug.'" class="btn btn-primary btn-sm">
                            <i class="fa-solid fa-pen text-light"></i>
                        </a>
                        &emsp13;
                        <a class="btn btn-danger btn-sm" href="/admin/daftar-obat/hapus-barang/.'.$product->id.'"
                            onclick="return confirm(`Apakah anda yakin ingin menghapus?`)">
                            <i class="fa-solid fa-trash-can text-light"></i>
                        </a>
                        &emsp;
                        <a href="/admin/detail-obat/'.$product->slug.'"
                            style="color: #1D242E; text-decoration: none;">Detail >></a>
                    </td>'.
                    '</tr>';
                    $a++;
            }
            return Response($output);
            }
        }
    }
    
}
