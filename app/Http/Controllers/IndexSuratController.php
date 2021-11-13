<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\IndexSurat;

class IndexSuratController extends Controller
{
    public function index()
    {
        $indexSurat = IndexSurat::with([])->get();
        return view('index-surat.index', compact('indexSurat'));
    }

    public function storeIndexSurat(Request $request, $id = null)
    {
        try {
            $indexSurat = ($id != null) ? IndexSurat::where('id', $id)->first() : new IndexSurat();
            $indexSurat->index_surat = $request->index_surat;
            $indexSurat->index_prihal = $request->index_prihal;
            $indexSurat->save();
            return redirect('admin/index-surat')->with([
                'message' => 'Berhasil simpan index surat',
                'style' => 'success'
            ]);
        } catch (\Exception $e) {
            return redirect('admin/index-surat')->with([
                'message' => 'Gagagl simpan'.$e->getMessage(),
                'style' => 'danger'
            ]);
        }   
    }

    public function deleteIndexSurat(Request $request, $id = null)
    {
        $indexSurat = IndexSurat::where('id', $id)->first();
        $indexSurat->delete();
        return redirect('admin/index-surat')->with([
            'message' => 'Index Surat Berhasil di hapus',
            'style' => 'info'
        ]);
    }
}
