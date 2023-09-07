<?php

namespace App\Http\Controllers;

use App\Models\ModelAntrian;
use App\Models\ModelServis;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AntrianController extends Controller
{
    public function antrian()
    {
        //antrian tanggal sekarang 
        $data = ModelAntrian::whereDate('created_at', date('Y-m-d'))->get();
        if ($data->count() > 0) {
            $sekarang = $data->count() + 1;
            //$nomor paling trakhir
            $dilayani = $data->last()->nomor;
        } else {
            $sekarang = 1;
            $dilayani = 0;
        }

        $antrian =
            ModelAntrian::whereDate('created_at', date('Y-m-d'))->orderBy('nomor', 'desc')->get();
            // return response()->json($antrian);

            //add key mekanik dan harga 
            foreach ($antrian as $key => $value) {
                $dataServis = ModelServis::where('nomor_antrian', $value->nomor)->whereDate('created_at', date('Y-m-d'))->get();
                if ($dataServis->count() > 0) {
                // return response()->json($dataServis);

                    $antrian[$key]['mekanik'] = $dataServis->first()->getUser->name;
                // return response()->json($dataServis->first()->getJenis->harga);

                    // $antrian[$key]['harga'] = $dataServis->first()->getJenis->harga;
                    $antrian[$key]['jenis_servis'] = $dataServis->first()->getJenis->nama_servis;
                    if ($dataServis->first()->getJenis->jenis == 'ringan') {
                        $antrian[$key]['harga'] = intval($dataServis->first()->getJenis->harga) + 10000;
                    } else {
                        $antrian[$key]['harga'] = intval($dataServis->first()->getJenis->harga) + 20000;
                    }
                } else {
                    $antrian[$key]['mekanik'] = '-';
                    $antrian[$key]['harga'] = '-';
                    $antrian[$key]['jenis_servis'] = '-';
                }
            }
            // return response()->json($antrian);

        return view('index', compact('sekarang', 'dilayani', 'antrian'));
    }

    public function post(Request $request)
    {
        $cek = $request->validate(
            [
                'nomor' => 'required',
                'nama' => 'required',
            ],
            [
                'nama.required' => 'Nama tidak boleh kosong',
                'nomor.required' => 'Antrian tidak boleh kosong',
            ]
        );

        if ($cek == false) {
            dd('gagal');
            return redirect()->back()->withErrors($cek)->withInput();
        } else {
            $data = new ModelAntrian();
            $data->nomor = $request->nomor;
            $data->nama = $request->nama;
            $data->status = 'antri';
            $data->save();
            Alert::success('Berhasil', 'Antrian berhasil ditambahkan');
            return redirect()->back();
        }
    }
}
