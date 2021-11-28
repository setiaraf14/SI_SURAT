<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suratkeluar;
use App\IndexSurat;
use Illuminate\Support\Facades\Storage;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $suratKeluar = Suratkeluar::with([])->get();
        return view('surat-keluar.index', compact('suratKeluar'));
    }

    public function createSuratKeluar(Request $request, $id = 0)
    {
        $suratKeluar = [];
        if($id) {
            $suratKeluar = SuratKeluar::with(['indexSurat'])->where('id', $id)->first();
        }
        $indexSurat = IndexSurat::with([])->get();
        return view('surat-keluar.create', compact('indexSurat', 'suratKeluar'));
    }

    public function storeSuratKeluar(Request $request, $id = null)
    {
        $suratKeluar = $id != null ? Suratkeluar::with([])->where('id', $id)->first() : $suratKeluar = new Suratkeluar();
        $suratKeluar->tujuan_surat = $request->tujuan_surat;
        $suratKeluar->nomor_surat = $request->nomor_surat;
        $suratKeluar->tanggal_surat = $request->tanggal_surat;
        $suratKeluar->prihal = $request->prihal;
        $suratKeluar->index_surat_id = $request->index_surat_id;
        if($id) {
            if($suratKeluar->softcopy_surat != "blum upload") {
                Storage::delete('public/'.$suratKeluar->softcopy_surat);
            }
            $suratKeluar->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratkeluar', 'public');
            $suratKeluar->save();
            return redirect('admin/surat-keluar')->with([
                'message' => 'Berhasil update surat keluar',
                'style' => 'success'
            ]);
        } else {
            if(!$request->softcopy_surat){
                $suratKeluar->softcopy_surat = "blum upload";
            } else {
                $suratKeluar->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratkeluar', 'public');
            }
            $suratKeluar->save();
            return redirect('admin/surat-keluar')->with([
                'message' => 'Berhasil simpan surat keluar',
                'style' => 'success'
            ]);
        }
    }

    public function showSuratKeluar(Request $request)
    {
        $suratKeluar = Suratkeluar::with([])->where('id', $request->id)->first();
        return view('surat-keluar.detail-surat', compact('suratKeluar')); 
    }
    
    public function deleteSuratKeluar(Request $request)
    {
        $suratKeluar = Suratkeluar::with([])->where('id', $request->id)->first();
        if($suratKeluar->softcopy_surat == "blum upload"){
            $suratKeluar->delete();
        } else {
            Storage::delete('public/'.$suratKeluar->softcopy_surat);
            $suratKeluar->delete();
        }
        return redirect('admin/surat-keluar')->with([
            'message' => 'Berhasil hapus surat masuk',
            'style' => 'success'
        ]);
    }
}
