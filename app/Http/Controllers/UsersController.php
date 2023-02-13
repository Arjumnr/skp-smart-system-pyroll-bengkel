<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;;

use App\Models\ModelUser;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index(Request $request)
    {
        $data = ModelUser::all();

        try {
            if ($request->ajax()) {
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function ($row) {
                        $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Edit" class="edit btn btn-success btn-sm edit"><i class="ri-ball-pen-line"></i></a>';
                        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-danger btn-sm delete"><i class="ri-delete-bin-2-line"></i></a>';
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
            }
            return view('admin.users.index');
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    public function store(Request $request)
    {
        try {
            ModelUser::updateOrCreate(
                ['id' => $request->data_id],
                [
                    'name' => $request->name,
                    'username' => $request->username,
                    'password' => Hash::make($request->password),
                    'role' => $request->role,
                ]
            );
            return response()->json(['status' => 'success', 'message' => 'Save data successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $dataUser = ModelUser::find($id);
        return response()->json($dataUser);
    }

    public function update(Request $request, $id)
    {
        $data = ModelUser::find($id);
        try {
            $data->update([
                'name' => $request->name,
                'username' => $request->username,
                'password' => $request->password,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Update data successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }


    public function destroy($id)
    {
        try {
            ModelUser::find($id)->delete();
            return response()->json(['status' => 'success', 'message' => 'Data deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
    
}
