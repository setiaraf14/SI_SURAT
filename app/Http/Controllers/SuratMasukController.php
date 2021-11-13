<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suratmasuk;
use App\IndexSurat;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = Suratmasuk::with(['indexSurat'])->get();
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function createSuratMasuk()
    {
        $indexSurat = IndexSurat::with([])->get();
        return view('surat-masuk.create', compact('indexSurat'));
    }

    public function storeSuratMasuk(Request $request)
    {
        $suratMasuk = new Suratmasuk();
        $suratMasuk->surat_dari = $request->surat_dari;
        $suratMasuk->nomor_surat = $request->nomor_surat;
        $suratMasuk->tanggal_surat = $request->tanggal_surat;
        $suratMasuk->tanggal_masuk_surat = date('Y-m-d');
        $suratMasuk->prihal = $request->prihal;
        $suratMasuk->index_surat_id = $request->index_surat_id;
        $suratMasuk->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratmasuk', 'public');
        $suratMasuk->save();
        return redirect('admin/surat-masuk')->with([
            'message' => 'Berhasil simpan surat masuk',
            'style' => 'success'
        ]);
    }
}
