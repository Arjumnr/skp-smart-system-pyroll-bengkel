<?php

namespace App\Http\Controllers;

use App\Models\ModelPenjualan;
use App\Models\ModelServis;
use App\Models\ModelUser;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    
    public function index()
    {
        $totAdmin = ModelUser::where('role', 1)->count();
        $totMekanik = ModelUser::where('role', 2)->count();

        $totServis = ModelServis::count();
        $totJual = ModelPenjualan::count();
        return view('admin.dashboard', compact('totAdmin', 'totMekanik', 'totServis', 'totJual'));

    }
}
