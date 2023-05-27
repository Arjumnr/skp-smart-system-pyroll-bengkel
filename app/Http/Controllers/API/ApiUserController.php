<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class ApiUserController extends Controller
{

    public function login(Request $request)
    {
        $rules = [
            'username'   => 'required',
            'password'   => 'required',

        ];

        $messages = [
            'username.required'      => 'Username wajib di isi',
            'password.required'        => 'Password wajib di isi',

        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['status' => false, 'message' => $validator->errors()->first(), 400]);
        }
        $model = $request->all();
        $data = ModelUser::where('username', $model['username'])->first();

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Username Salah',
            ], 400);
        } else if (Hash::check($model['password'], $data->password)) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Login',
                'data'    => $data,
            ], 201);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Password Salah',
            ], 400);
        }
    }
}
