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
    public function getHonor($id)
    {

        $dataHonor = ModelHonor::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
        //add data penjualan, servis,
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
            $dataServis = ModelServis::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
            $dataHonor[$key]['total_servis'] = count($dataServis);

            //kirim berapa total penjualan yang dilakukan oleh user
            $dataPenjualan = ModelPenjualan::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
            $dataHonor[$key]['total_penjualan'] = count($dataPenjualan);
            



        }

            //kirim berapa total honor yang didapat oleh user jika penjualan kali 10000 dan ketika servis ringan * 10000 dan servis berat kali 30000

           foreach ($dataHonor as $key => $value) {
            $dataPenjualan = ModelPenjualan::where('id', $value->penjualan_id)->first();
            $dataServis = ModelServis::where('id', $value->servis_id)->first();
            $dataJenis = ModelJenis::all();
            $dataHonor[$key]['penjualan'] = $dataPenjualan;
            $dataHonor[$key]['servis'] = $dataServis;
            $dataHonor[$key]['jenis'] = $dataJenis;

            //kirim berapa total servis yang dilakukan oleh user 
            $dataServis = ModelServis::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
            $dataHonor[$key]['total_servis'] = count($dataServis);

            //kirim berapa total penjualan yang dilakukan oleh user
            $dataPenjualan = ModelPenjualan::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
            $dataHonor[$key]['total_penjualan'] = count($dataPenjualan);

            //kirim berapa total honor yang didapat oleh user jika penjualan kali 10000 dan ketika servis ringan * 10000 dan servis berat kali 30000
            $dataHonor[$key]['total_honor'] = ($dataHonor[$key]['total_penjualan'] * 10000) + ($dataHonor[$key]['total_servis'] * 10000) + ($dataHonor[$key]['total_servis'] * 30000);
        }


        return response()->json([
            'status' => true,
            'message' => 'Data Honor',
            'data'    => $dataHonor,
        ], 201);
        // $data = ModelHonor::where('user_id', $id)->first();
        // if (!$data) {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Data Tidak Ada',
        //         'data'    => [],
        //     ], 400);
        // } else {
        //     return response()->json([
        //         'status' => true,
        //         'message' => 'Data Honor',
        //         'data'    => $data,
        //     ], 201);
        // }
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
