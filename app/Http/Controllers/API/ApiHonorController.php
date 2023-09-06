<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelHonor;
use App\Models\ModelJenis;
use App\Models\ModelPenjualan;
use App\Models\ModelServis;
use App\Models\ModelBarang;
use Yajra\DataTables\Html\Editor\Fields\Select;

class ApiHonorController extends Controller
{
    // public function getHonor($id)
    // {

    //     $dataHonor = ModelHonor::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
    //     //add data penjualan, servis,
    //     foreach ($dataHonor as $key => $value) {
    //         $dataPenjualan = ModelPenjualan::where('id', $value->penjualan_id)->get();
    //         $dataServis = ModelServis::where('id', $value->servis_id)->get();
    //         $dataJenis = ModelJenis::all();
    //         //data barang dari barang id di model penjualan
    //         $dataBarang = $dataPenjualan->map(function ($item) {
    //             return ModelBarang::where('id', $item->barang_id)->get();
    //         });
    //         //remove duplicate [][]
    //         $dataBarang = $dataBarang->flatten();
            
            
        

    //         $dataHonor[$key]['penjualan'] = $dataPenjualan;
    //         $dataHonor[$key]['servis'] = $dataServis;
    //         $dataHonor[$key]['jenis'] = $dataJenis;
    //         $dataHonor[$key]['barang'] = $dataBarang;

    //         //kirim berapa total servis yang dilakukan oleh user 
    //         $dataServis = ModelServis::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
    //         $dataHonor[$key]['total_servis'] = count($dataServis);

    //         //kirim berapa total penjualan yang dilakukan oleh user
    //         $dataPenjualan = ModelPenjualan::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
    //         $dataHonor[$key]['total_penjualan'] = count($dataPenjualan);
            



    //     }

    //         //kirim berapa total honor yang didapat oleh user jika penjualan kali 10000 dan ketika servis ringan * 10000 dan servis berat kali 30000

    //        foreach ($dataHonor as $key => $value) {
    //         $dataPenjualan = ModelPenjualan::where('id', $value->penjualan_id)->first();
    //         $dataServis = ModelServis::where('id', $value->servis_id)->first();
    //         $dataJenis = ModelJenis::all();
    //         $dataHonor[$key]['penjualan'] = $dataPenjualan;
    //         $dataHonor[$key]['servis'] = $dataServis;
    //         $dataHonor[$key]['jenis'] = $dataJenis;

    //         //kirim berapa total servis yang dilakukan oleh user 
    //         $dataServis = ModelServis::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
    //         $dataHonor[$key]['total_servis'] = count($dataServis);

    //         //kirim berapa total penjualan yang dilakukan oleh user
    //         $dataPenjualan = ModelPenjualan::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
    //         $dataHonor[$key]['total_penjualan'] = count($dataPenjualan);

    //         //kirim berapa total honor yang didapat oleh user jika penjualan kali 10000 dan ketika servis ringan * 10000 dan servis berat kali 30000
    //         $dataHonor[$key]['total_honor'] = ($dataHonor[$key]['total_penjualan'] * 10000) + ($dataHonor[$key]['total_servis'] * 10000) + ($dataHonor[$key]['total_servis'] * 30000);
    //     }


    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Data Honor',
    //         'data'    => $dataHonor,
    //     ], 201);
    //     // $data = ModelHonor::where('user_id', $id)->first();
    //     // if (!$data) {
    //     //     return response()->json([
    //     //         'status' => false,
    //     //         'message' => 'Data Tidak Ada',
    //     //         'data'    => [],
    //     //     ], 400);
    //     // } else {
    //     //     return response()->json([
    //     //         'status' => true,
    //     //         'message' => 'Data Honor',
    //     //         'data'    => $data,
    //     //     ], 201);
    //     // }
    // }

    public function getHonorBulanan($id, $bulan = null){
        //switc case bulan yang dikondisikan adalah nama 
       
        if ($bulan != null){
            switch($bulan){
                case 'Januari':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 1)->get();
                    $bulan = 1;
                    break;
                case 'Februari':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 2)->get();
                    $bulan = 2;
                    break;
                case 'Maret':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 3)->get();
                    $bulan = 3;
                    break;
                case 'April':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 4)->get();
                    $bulan = 4;
                    break;
                case 'Mei':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 5)->get();
                    $bulan = 5;
                    break;
                case 'Juni':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 6)->get();
                    $bulan = 6;
                    break;
                case 'Juli':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 7)->get();
                    $bulan = 7;
                    break;
                case 'Agustus':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 8)->get();
                    $bulan = 8;
                    break;
                case 'September':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 9)->get();
                    $bulan = 9;
                    break;
                case 'Oktober':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 10)->get();
                    $bulan = 10;
                    break;
                case 'November':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 11)->get();
                    $bulan = 11;
                    break;
                case 'Desember':
                    $dataHonor = ModelHonor::where('user_id', $id)->whereMonth('created_at', 12)->get();
                    $bulan = 12;
                    break;
            }
            // return response()->json([
            //     'status' => true,
            //     'message' => 'Data Honor',
            //     'data'    => $bulan,
            // ]);
            foreach ($dataHonor as $key => $value) {
                $dataPenjualan = ModelPenjualan::where('id', $value->penjualan_id)->get();
                $dataServis = ModelServis::where('id', $value->servis_id)->get();
                $dataJenis = ModelJenis::all();
                //data barang dari barang id di model penjualan
                $dataBarang = $dataPenjualan->map(function ($item) {
                    return ModelBarang::where('id', $item->barang_id)->get();
                });
                //remove duplicate [][]
                $dataBarang = $dataBarang->flatten();
                
                
            
    
                $dataHonor[$key]['penjualan'] = $dataPenjualan;
                $dataHonor[$key]['servis'] = $dataServis;
                $dataHonor[$key]['jenis'] = $dataJenis;
                $dataHonor[$key]['barang'] = $dataBarang;
    
                //kirim berapa total servis yang dilakukan oleh user 
                $dataServis = ModelServis::where('user_id', $id)->whereMonth('created_at', $bulan)->get();
               
                $dataHonor[$key]['total_servis'] = count($dataServis);
    
                //kirim berapa total penjualan yang dilakukan oleh user
                $dataPenjualan = ModelPenjualan::where('user_id', $id)->whereMonth('created_at', $bulan)->get();
                $dataHonor[$key]['total_penjualan'] = count($dataPenjualan);
                
    
    
    
            }
    
                //kirim berapa total honor yang didapat oleh user jika penjualan kali 10000 dan ketika servis ringan * 10000 dan servis berat kali 30000
                $dataServisBerat = 0;
                $dataServisRingan = 0;
               foreach ($dataHonor as $key => $value) {
                $dataPenjualan = ModelPenjualan::where('id', $value->penjualan_id)->first();
                $dataServis = ModelServis::where('id', $value->servis_id)->first();
                $dataJenis = ModelJenis::all();
                $dataHonor[$key]['penjualan'] = $dataPenjualan;
                $dataHonor[$key]['servis'] = $dataServis;
                $dataHonor[$key]['jenis'] = $dataJenis;
    
                //kirim berapa total servis yang dilakukan oleh user 
                $dataServis = ModelServis::where('user_id', $id)->whereMonth('created_at', $bulan)->with('getJenis')->get();
                if ($dataServis){
                    $dataServisRingan = $dataServis->filter(function ($item) {
                        return $item->getJenis->jenis == 'ringan';
                    });
    
                    $dataServisBerat = $dataServis->filter(function ($item) {
                        return $item->getJenis->jenis == 'berat';
                    });

                    $dataServisRingan = count($dataServisRingan);
                    $dataServisBerat = count($dataServisBerat);
                    // $dataHonor[$key]['total_servis'] = $dataServisRingan + $dataServisBerat;
                }
               

               
                // return response()->json([
                //     'status' => true,
                //     'message' => 'Data Honor Bulanan',
                //     'data'    => $dataHonor,
                // ], 201);
                //kirim berapa total penjualan yang dilakukan oleh user
                $dataPenjualan = ModelPenjualan::where('user_id', $id)->whereMonth('created_at', $bulan)->get();
                $dataHonor[$key]['total_penjualan'] = count($dataPenjualan);
                $dataHonor[$key]['total_ringan'] = $dataServisRingan;
                $dataHonor[$key]['total_berat'] = $dataServisBerat;

                $hitungBerat = $dataServisBerat * 20000;
                $hitungRingan = $dataServisRingan * 10000;
                $hitungPenjualan = count($dataPenjualan) * 10000;
    
                //kirim berapa total honor yang didapat oleh user jika penjualan kali 10000 dan ketika servis ringan * 10000 dan servis berat kali 30000
                $dataHonor[$key]['total_honor'] = $hitungBerat + $hitungRingan + $hitungPenjualan;
            }
    
            return response()->json([
                'status' => true,
                'message' => 'Data Honor Bulanan',
                'data'    => $dataHonor,
            ], 201);
        }
        else{
        
            return response()->json([
                'status' => true,
                'message' => 'Data Honor',
                'data'    => [],
            ], 201);
        }


        
    }

    // public function postHonor(Request $request)
    // {
    //     $model = $request->all();
    //     $model['user_id'] = $request->user_id;
    //     $model['penjualan_id'] = $request->penjualan_id;
    //     $model['servis_id'] = $request->servis_id;

    //     $data = ModelHonor::create($model);
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Berhasil Tambah Honor',
    //         'data'    => $data,
    //     ], 201);
    // }
}
