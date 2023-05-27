<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelHonor;


class ApiHonorController extends Controller
{
    public function getHonor($id)
    {
        $data = ModelHonor::where('user_id', $id)->first();
        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Tidak Ada',
                'data'    => [],
            ], 400);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'Data Honor',
                'data'    => $data,
            ], 201);
        }
        
        
    }
}
