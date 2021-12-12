<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suratmasuk;
use App\IndexSurat;
use Illuminate\Support\Facades\Storage;
use PDF;

class SuratMasukController extends Controller
{
    public function index()
    {
        $suratMasuk = Suratmasuk::with(['indexSurat'])->get();
        return view('surat-masuk.index', compact('suratMasuk'));
    }

    public function createSuratMasuk(Request $request, $id = 0)
    {
        $suratMasuk = [];
        if($id) {
            $suratMasuk = Suratmasuk::with(['indexSurat'])->where('id', $id)->first();
        }
        $indexSurat = IndexSurat::with([])->get();
        return view('surat-masuk.create', compact('indexSurat', 'suratMasuk'));
    }

    public function storeSuratMasuk(Request $request, $id = null)
    {
        $suratMasuk = $id != null ? Suratmasuk::with([])->where('id', $id)->first() : $suratMasuk = new Suratmasuk();
        $suratMasuk->surat_dari = $request->surat_dari;
        $suratMasuk->nomor_surat = $request->nomor_surat;
        $suratMasuk->tanggal_surat = $request->tanggal_surat;
        $suratMasuk->tanggal_masuk_surat = date('Y-m-d');
        $suratMasuk->prihal = $request->prihal;
        if($id == null) {
            $suratMasuk->status = "incomming";
        }
        $suratMasuk->index_surat_id = $request->index_surat_id;
        if($id) {
            if($suratMasuk->softcopy_surat != "blum upload") {
                Storage::delete('public/'.$suratMasuk->softcopy_surat);
            }
            $suratMasuk->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratmasuk', 'public');
            $suratMasuk->save();
            return redirect('admin/surat-masuk')->with([
                'message' => 'Berhasil update surat masuk',
                'style' => 'success'
            ]);
        } else {
            if(!$request->softcopy_surat){
                $suratMasuk->softcopy_surat = "blum upload";
            } else {
                $suratMasuk->softcopy_surat = $request->file('softcopy_surat')->store('asset/suratmasuk', 'public');
            }
            $suratMasuk->save();
            return redirect('admin/surat-masuk')->with([
                'message' => 'Berhasil simpan surat masuk',
                'style' => 'success'
            ]);
        }
    }

    public function showSuratMasuk(Request $request)
    {
        $suratMasuk = Suratmasuk::with([])->where('id', $request->id)->first();
        return view('surat-masuk.detail-surat', compact('suratMasuk')); 
    }

    public function deleteSuratMasuk(Request $request)
    {
        $suratMasuk = Suratmasuk::with([])->where('id', $request->id)->first();
        if($suratMasuk->softcopy_surat == "blum upload"){
            $suratMasuk->delete();
        } else {
            Storage::delete('public/'.$suratMasuk->softcopy_surat);
            $suratMasuk->delete();
        }
        return redirect('admin/surat-masuk')->with([
            'message' => 'Berhasil hapus surat masuk',
            'style' => 'success'
        ]);
    }

    public function changeStatusAprove(Request $request, $id = null)
    {
        $suratMasuk = Suratmasuk::with([])->where('id', $id)->first();
        $suratMasuk->status = "Tindak Lanjuti";
        $suratMasuk->save();
        return redirect('admin/surat-masuk')->with([
            'message' => 'Berhasil ubah status',
            'style' => 'success'
        ]);
    }

    public function changeStatusDisprove(Request $request, $id = null)
    {
        $suratMasuk = Suratmasuk::with([])->where('id', $id)->first();
        $suratMasuk->status = "Tidak diLanjuti";
        $suratMasuk->save();
        return redirect('admin/surat-masuk')->with([
            'message' => 'Berhasil ubah status',
            'style' => 'success'
        ]);
    }

    public function printDesposisi(Request $request, $id=null)
    {
        $suratMasuk = Suratmasuk::with(['indexSurat'])->where('id', $id)->first();
        // return view('surat-masuk.desposisi', compact('suratMasuk'));
        $pdf = PDF::loadview('surat-masuk.desposisi', compact('suratMasuk'))->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
