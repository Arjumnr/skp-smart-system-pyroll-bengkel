<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelPenjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiPenjualanController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'nama_pelanggan'   => 'required',
            'nama_barang'   => 'required',
        ];

        $messages = [
            'nama_pelanggan.required'      => 'Nama Pelanggan wajib di isi',
            'nama_barang.required'        => 'Nama Barang wajib di isi',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 400]);
        }

        $model = $request->all();
        $data = ModelPenjualan::create($model);
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Tambah',
            'data'    => $data,
        ], 201);
    }
}
