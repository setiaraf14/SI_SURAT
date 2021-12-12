<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suratkeluar;
use App\Suratmasuk;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $suratMasuk = Suratmasuk::with([])->get()->count();
        $suratKeluar = SuratKeluar::with([])->get()->count();
        return view('dashboard', compact('suratMasuk', 'suratKeluar'));
    }
}
