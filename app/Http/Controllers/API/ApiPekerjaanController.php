<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelAntrian;
use App\Models\ModelJenis;
use App\Models\ModelServis;
use Illuminate\Http\Request;

class ApiPekerjaanController extends Controller
{
    
    //add pekerjaan
    public function addPekerjaan(Request $request)
    {
        try{
            $model = $request->all();
            $noAntrian = $request->nomor_antrian;
            $data = ModelServis::create($model);
            $dataAntrian = ModelAntrian::where('nomor', $noAntrian)->first();
            $dataAntrian->status = 'proses';
            $dataAntrian->save();
            if ($data) {
                return response()->json([
                    'status' => true,
                    'message' => 'Berhasil Tambah Pekerjaan',
                    'data'    => $data,
                ], 201);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'Gagal Tambah Pekerjaan',
                    'data'    => $data,
                ], 400);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Tambah Pekerjaan',
                'data'    => $e->getMessage(),
            ], 400);
        }
    }

    public function putSelesai($id){
        $data = ModelServis::where('id', $id)->first();
        $data->status = 'selasai';
        $data->save();
        return response()->json([
            'status' => true,
            'message' => 'Berhasil Selesai Pekerjaan',
            'data'    => $data,
        ], 201);
    }
}
