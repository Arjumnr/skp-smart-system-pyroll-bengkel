<?php

namespace App\Http\Controllers;

use App\Models\ModelHonor;
use App\Models\ModelPenjualan;
use App\Models\ModelServis;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class HonorController extends Controller
{
    public function index(Request $request)
    {
        // $data = ModelHonor::with('getUser')->with('getPenjualan')->with('getServis')->get();
        // // isi data yaitu data user, namanya... data penjualan atau servvis terus honornya 
        // $data = ModelHonor::with('getUser')->with('getPenjualan')->with('getServis')->get();
        // // isi data yaitu data user, namanya... data penjualan atau servvis terus honornya
        // //add key penjualan atau servis dan total honor per penjualan atau servis  tampilkan semua bukan berdasarkan user 
        // foreach ($data as $key => $value) {
        //     $dataPenjualan = ModelPenjualan::where('id', $value->penjualan_id)->first();
        //     $dataServis = ModelServis::where('id', $value->servis_id)->first();
        //     $dataHonor[$key]['penjualan'] = $dataPenjualan;
        //     $dataHonor[$key]['servis'] = $dataServis;
        //     $dataHonor[$key]['total_honor'] = ($dataHonor[$key]['penjualan']->harga * 0.1) + ($dataHonor[$key]['servis']->harga * 0.1);
        // }

        
        $data  = ModelHonor::with('getUser')->with('getPenjualan')->with('getServis')->get();
        

        try {
            if ($request->ajax()) {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        // $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit"><i class="ri-ball-pen-line"></i></a>';
                        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="ri-delete-bin-2-line"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.honor.index');
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    // public function store(Request $request)
    // {
    //     try {
    //         ModelPenjualan::updateOrCreate(
    //             ['id' => $request->data_id],
    //             [
    //                 'jenis' => $request->jenis,
    //                 'nama_servis' => $request->nama_servis,
    //             ]
    //         );
    //         return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }

    // public function edit($id)
    // {
    //     $dataUser = ModelPenjualan::find($id);
    //     return response()->json($dataUser);
    // }


    // public function destroy($id)
    // {
    //     try {
    //         ModelPenjualan::find($id)->delete();
    //         return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
    //     } catch (\Exception $e) {
    //         return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
    //     }
    // }
}
