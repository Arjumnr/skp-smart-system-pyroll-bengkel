<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelAntrian;

class ApiAntrianController extends Controller
{
    public function getAntrian()
    {
        $model = ModelAntrian::all();
        return response()->json([
            'status' => true,
            'message' => 'Data Antrian All',
            'data'    => $model,
        ], 201);
    }

    public function getAntrianKerja()
    {
        //antrian status antri tanggal ini
        $model = ModelAntrian::where('status', 'antri')->whereDate('created_at', date('Y-m-d'))->orderBy('created_at', 'asc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data Antri Kerja',
            'data'    => $model,
        ], 201);
    }

    // public function store(Request $request)
    // {
    //     $rules = [
    //         'username'        => 'required|unique:users',
    //         'password'   => 'required',
    //         'no_hp'     => 'required',

    //     ];

    //     $messages = [
    //         'username.required'      => 'Username wajib di isi',
    //         'username.unique'      => 'Username Sudah Terdaftar',
    //         'password.required'        => 'Password wajib di isi',
    //         'no_hp.required'           => 'No hp wajib di isi',

    //     ];

    //     $validator = Validator::make($request->all(), $rules, $messages);

    //     if ($validator->fails()) {
    //         return response()->json(['status' => false, 'message' => $validator->errors()->first(), 400]);
    //     }

    //     $model = $request->all();
    //     $model['password'] = bcrypt($model['password']);
    //     $data = ModelUser::create($model);
    //     return response()->json([
    //         'status' => true,
    //         'message' => 'Berhasil Tambah',
    //         'data'    => $data,
    //     ], 201);
    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
