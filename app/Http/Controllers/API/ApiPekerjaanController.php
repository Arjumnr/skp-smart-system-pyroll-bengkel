<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelAntrian;
use App\Models\ModelHonor;
use App\Models\ModelJenis;
use App\Models\ModelServis;
use Illuminate\Http\Request;

class ApiPekerjaanController extends Controller
{

    //add pekerjaan
    public function addPekerjaan(Request $request)
    {
        try {
            $model = $request->all();
            $noAntrian = $request->nomor_antrian;
            $data = ModelServis::create($model);
            //update status antrian menjadi proses where no antrian dan tanggal hari ini
            $dataAntrian = ModelAntrian::where('nomor', $noAntrian)->whereDate('created_at', date('Y-m-d'))->first();
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

    public function getPekerjaan($id)
    {
        $data = ModelServis::with('getJenis')->where('user_id', $id)->whereDate('created_at', date('Y-m-d'))->orderBy('id', 'desc')->get();
        //add key antrian where antrian data servis yang sesuai 
        foreach ($data as $key => $value) {
            $dataAntrian = ModelAntrian::where('nomor', $value->nomor_antrian)->whereDate('created_at', date('Y-m-d'))->first();
            $data[$key]['antrian'] = $dataAntrian;
        }

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ada',
                'data'    => [],
            ], 400);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data Pekerjaan',
                'data'    => $data,
            ], 201);
        }
    }

    public function getPekerjaanBulanan($id, $bulan)
    {
        $data = ModelServis::with('getJenis')->where('user_id', $id)->whereMonth('created_at', $bulan)->orderBy('id', 'desc')->get();
        //add key antrian where antrian data servis yang sesuai 
        foreach ($data as $key => $value) {
            $dataAntrian = ModelAntrian::where('nomor', $value->nomor_antrian)->whereMonth('created_at', $bulan)->first();
            $data[$key]['antrian'] = $dataAntrian;
        }

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ada',
                'data'    => [],
            ], 400);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data Pekerjaan',
                'data'    => $data,
            ], 201);
        }
    }

    public function putSelesai($id)
    {

        $dataAntrian = ModelAntrian::where('id', $id)->first();
        $dataAntrian->status = 'selesai';
        $dataAntrian->save();
        $data = ModelServis::where('nomor_antrian', $dataAntrian->nomor)->where('nama_pelanggan', $dataAntrian->nama)->with('getJenis')->first();
        $data->w_selesai = date('H:i:s');
        $data->save();

        $dataHonor = new ModelHonor();
        $dataHonor->user_id = $data->user_id;
        $dataHonor->servis_id = $data->id;
        //jika servis ringan honor = 10000 dan servis berat honor = 20000
        if ($data->getJenis->jenis == 'ringan') {
            $dataHonor->honor = 10000;
        } else {
            $dataHonor->honor = 20000;
        }
        // $dataHonor->honor = $honor;
        $dataHonor->save();


        return response()->json([
            'status' => true,
            'message' => 'Berhasil Selesai Pekerjaan',
            'data'    => $data,
        ], 201);
    }
}
