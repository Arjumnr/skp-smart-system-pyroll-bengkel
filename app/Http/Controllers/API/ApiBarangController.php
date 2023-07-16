<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ModelBarang;
use Illuminate\Http\Request;

class ApiBarangController extends Controller
{
    public function getBarang()
    {
        $model = ModelBarang::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Barang All',
            'data'    => $model,
        ], 201);
    }
}
