<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelJenis;
use App\Models\ModelPenjualan;
use Illuminate\Http\Request;
use App\Models\ModelServis;

class ApiServisController extends Controller
{
    public function getJenisServis()
    {
        //order by id desc
        $model = ModelJenis::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data Jenis Servis All',
            'data'    => $model,
        ], 201);
    }

    public function getServisAll()
    {
        $model = ModelServis::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data  Servis All',
            'data'    => $model,
        ], 201);
    }

    public function pembelian(Request $request)
    {
        $model = $request->all();
        $data = ModelPenjualan::create($model);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Tambah Pemnjualan',
            'data'    => $data,
        ], 201);
    }
}
