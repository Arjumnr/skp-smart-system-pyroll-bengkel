<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelHonor;
use App\Models\ModelPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiPenjualanController extends Controller
{
    public function pembelian(Request $request)
    {
        $model = $request->all();
        $data = ModelPenjualan::create($model);
        $dataHonor = new ModelHonor();
        $dataHonor->user_id = $request->user_id;
        $dataHonor->penjualan_id = $data->id;

        $dataHonor->save();
        // if ($data) {
        //     $dataPenjualan = ModelPenjualan::latest()->first();
        //     $modelHonor = new ModelHonor();
        //     $modelHonor->user_id = $request->user_id;
        //     $modelHonor->penjualan_id = $dataPenjualan->id;
        //     $modelHonor->save();
        // }
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Tambah Pemnjualan',
            'data'    => $data,
        ], 201);
    }

    //getDataPenjualan by id user hari ini
    public function getDataPenjualan($id)
    {
        $data = ModelPenjualan::where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->get();
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ada',
                'data'    => [],
            ], 400);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data Penjualan',
                'data'    => $data,
            ], 201);
        }
    }
}
