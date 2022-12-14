<?php

namespace App\Http\Controllers\Admin;
// use App\Http\Controllers\DateTime;
// use DateTime;
 
use App\Http\Controllers\Controller;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
 
class TransaksiController extends Controller
{  
    public function __construct()
    {
        $this->middleware('adminMiddle');
    }

   
    public function index (Request $request){

        if($request->ajax()){
            $output="";
            $products=DB::table('barang')
            ->where('nama','LIKE','%'.$request->namaP."%")
            ->get();
        
            // if ($products->isEmpty()){
            //     $products=DB::table('barang') ->get();
            // }
            if($products){
                foreach ($products as $key => $product) {
        
                    $output.= '<input id="harga" type="text" class="form-control border-secondary text-dark" disabled
                    style="background-color: #BFBFBF" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-sm" value="'.$product->harga * $request->harga.'" >';

               
                }
                return Response($output);
                }
            }


            
    }

    public function keranjang (Request $request){
        $data = $request->namaP;
        // $arr = explode(" ", $data);
        
        if($request->ajax()){
            $output="";
            $products=DB::table('barang')
            ->where('nama','LIKE','%'.$request->namaP."%")
            ->get();
            if($products){
                foreach ($products as $key => $product) {
                    $output=  ' <tr id="'.strtok($request->namaP, " ").$request->harga.'"  >
                    <td>'.$request->namaP.'</td>
                    <td>'.$product->harga.'</td>
                    <td>'.$request->harga.'</td>
                    <td id="total'.strtok($request->namaP, " ").$request->harga.'">'.$product->harga * $request->harga.'</td>
                    <td id="aksi" >
                        <button class="btn btn-danger btn-sm" onclick= aktif("'.rawurlencode($data).'");delete_row("'.strtok($request->namaP, " ").$request->harga.'");>
                            <i class="fa-solid fa-trash-can text-light"></i>
                        </button>
                    </td>
                </tr>';
                }
                return Response($output);
                }
            }
        }

        public function tambah2 (Request $request){
            $total = 0;
            date_default_timezone_set('Asia/Jakarta');   
                $time = date("Y-m-d", time()); 
                DB::table('struk')->insert([
                    'nama' => $request->nama,
                    'jumlah' =>$request->jumlah,
                    'harga' =>$request->harga,
                    'harga_total' => $request->total
                ]);
                $products2=DB::table('barang')
                ->where( 'nama', 'LIKE', $request->nama)
                ->get();

                foreach ($products2 as $key => $product2) {
                    $total2 = $product2->sisa;
                }
                DB::table('barang')->where(  'nama', 'LIKE', $request->nama )->update([
                    'sisa' =>  $total2 - $request->jumlah,
                ]);

                $products=DB::table('laporan_pemasukan')
                ->where(  'tanggal', 'LIKE','%'.$time."%")
                ->get();

                if ($products ){
                    foreach ($products as $key => $product) {
                        $total = $product->total;
                    }
                    DB::table('laporan_pemasukan')->where(  'tanggal', 'LIKE','%'.$time."%")->update([
                        'total' =>  $total + $request->total,
                    ]);
                }
                if ($products->isEmpty()){
                    DB::table('laporan_pemasukan')->insert([
                        'tanggal' => $time,
                        'total' =>$request->total,
                        'periode' => date('F Y')
                    ]);
                }

                echo "Record inserted successfully";
        }

        public function sort (Request $request){
            if($request->ajax()){
                $a = 1;
                $output="";
                $products=DB::table('struk')
                ->whereBetween(  DB::raw('DATE(tanggal)'), [$request->tanggal1, $request->tanggal2])
                ->orderby('tanggal')
                ->get();
                if($products){
                    foreach ($products as $key => $product) {
                        $output.=  '<tr>
                        <th scope="row">'.$a.'</th>
                        <td>'.$product->id.'</td>
                        <td>'. date('d/m/Y', strtotime($product->tanggal)).'</td>
                        <td>'.$product->nama.'</td>
                        <td>'.$product->jumlah.'</td>
        
                        <td>'.$product->harga_total.'</td>
                    </tr>';
                    $a++;
                    }
                    }
                    return Response($output);
            }
            }

            public function sortPemasukan (Request $request){
                if($request->ajax()){
                    $a = 1;
                    $output="";
                    $products=DB::table('laporan_pemasukan')
                    ->whereBetween(  DB::raw('DATE(tanggal)'), [$request->tanggal1, $request->tanggal2])
                    ->orderby('tanggal')
                    ->get();
                    if($products){
                        foreach ($products as $key => $product) {
                            $output.=  '<tr>
                            <th scope="row">'.$a.'</th>
                            <td>'.date('d/m/Y', strtotime($product->tanggal)).'</td>
                            <td>'.$product->total.'</td>
                        </tr>';
                        $a++;
                        }
                    }
                    return Response($output);
                }
            }

            public function minim (Request $request){
                if($request->ajax()){
                    $a = 1;
                    $output="";
                    $products=DB::table('barang')->get();
                    if($products){
                        foreach ($products as $key => $product) {
                            if ($product->minimal > $product->sisa){

                            $output.= '<tr>
                            <th scope="row">'. $a.'</th>
                            <td>'.$product->id.'</td>
                            <td>'.$product->nama.'</td>
                            <td>'.$product->kategori.'</td>
                            <td style="color: #F0483E"><b>'.$product->sisa.'</b></td>
                            tr>';
                            $a++;
                            }
                        
                        }
                    }
                    return Response($output);
                }
            }

            public function sortBarangmasuk (Request $request){
                if($request->ajax()){
                    $a = 1;
                    $output="";
                    $products=DB::table('laporan_barangmasuk')
                    ->whereBetween(  DB::raw('DATE(tanggal)'), [$request->tanggal1, $request->tanggal2])
                    ->orderby('tanggal')
                    ->get();
                    if($products){
                        foreach ($products as $key => $product) {
                            $output.=  '<tr>
                            <th scope="row">'.$a.'</th>
                            <td>'.$product->id.'</td>
                            <td>'.$product->nama.'</td>
                            <td>'.$product->kategori.'</td>
                            <td>'.$product->suplier.'</td>
                            <td>'. date('d/m/Y', strtotime($product->tanggal)).'</td>
                            <td>'.$product->jumlah.'</td>

                        </tr>';
                        $a++;
                        }
                    }
                    return Response($output);
                }
            }
        public function periodeSelect (Request $request){
            $label=array(); 
            $data=array();
            $datas=array();
            $list = DB::table('laporan_pemasukan')
            ->where('periode',$request->search)
            ->orderby('tanggal', 'asc')
            ->get();

            foreach($list as $key => $value){
                array_push($label, substr($value->tanggal, -2));
                array_push($data, $value->total);
             }
             array_push($datas, $label);
             array_push($datas, $data);

             return Response($datas);
            }

            public function periodePendapatan (Request $request){
                $pendapatan = DB::table('laporan_pemasukan')
                ->where('periode', $request->search)
                ->sum('total');
    
                $output  = '  <div id="outputPendapatan" class="fs-5 mt-2">Rp. '.number_format($pendapatan).',-</div>';
                 return Response($output);
                }


                public function searchKadaluarsa(Request $request)
                {
                    date_default_timezone_set('Asia/Jakarta');   
                    $time = date("Y-m-d H:i:s", time()); 

                    if($request->ajax()){
                            $a = 1;
                            $output="";
                            $products=DB::table('barang')
                            ->where('kadaluarsa' ,'<=', $time  )
                            ->where('nama','LIKE','%'.$request->search."%")
                            // ->orwhere('kategori','LIKE','%'.$request->search."%")
                            ->paginate(10)->onEachSide(0);
                        
                            // if ($products->isEmpty()){
                            //     $products=DB::table('barang') ->get();
                            // }
                            if($products){
                                foreach ($products as $key => $product) {
                        
                                $output.='<tr>'.
                                '<td>'.$a.'</td>'.
                                '<td>'.$product->id.'</td>'.
                                '<td>'.$product->nama.'</td>'.
                                '<td>'.$product->kategori.'</td>'.
                                '<td>'.$product->kadaluarsa.'</td>'.
                                '<td>'.$product->sisa.'</td>'.
                               
                                '</tr>';
                                $a++;
                        }
                        return Response($output);
                        }
                    }
                }

                public function filterKadaluarsa(Request $request)
                {
                    date_default_timezone_set('Asia/Jakarta');   
                    $time = date("Y-m-d H:i:s", time()); 

                    if($request->ajax()){
                            $a = 1;
                            $output="";
                            $products=DB::table('barang')
                            ->where('kadaluarsa' ,'<=', $time  )
                            ->where('kategori','LIKE','%'.$request->search."%")
                            // ->orwhere('kategori','LIKE','%'.$request->search."%")
                            ->paginate(10)->onEachSide(0);
                        
                            if ($products->isEmpty()){
                                $products=DB::table('barang')
                                ->where('kadaluarsa' ,'<=', $time  )
                                ->paginate(10)->onEachSide(0);
                            }
                            if($products){
                                foreach ($products as $key => $product) {
                        
                                $output.='<tr>'.
                                '<td>'.$a.'</td>'.
                                '<td>'.$product->id.'</td>'.
                                '<td>'.$product->nama.'</td>'.
                                '<td>'.$product->kategori.'</td>'.
                                '<td>'.$product->kadaluarsa.'</td>'.
                                '<td>'.$product->sisa.'</td>'.
                               
                                '</tr>';
                                $a++;
                        }
                        return Response($output);
                        }
                    }
                }
}
