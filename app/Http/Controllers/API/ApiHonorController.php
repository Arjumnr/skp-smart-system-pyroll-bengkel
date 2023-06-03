<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelHonor;
use App\Models\ModelPenjualan;
use App\Models\ModelServis;

class ApiHonorController extends Controller
{
    public function getHonor($id)
    {
        $dataPenjualan = ModelPenjualan::where('user_id', $id)->get();
        $dataServis = ModelServis::where('user_id', $id)->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Honor',
            'data'    => $dataPenjualan,
            'data2'    => $dataServis,
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
