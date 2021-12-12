<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Suratmasuk;
use App\Suratkeluar;

class IndexSurat extends Model
{
    protected $tabel = 'index_surats';
    protected $guarded = [];

    public function suratMasuk()
    {
        return $this->hasMany(Suratmasuk::class, 'index_surat_id', 'id');
    }

    public function suratKeluar()
    {
        return $this->hasMany(Suratkeluar::class, 'index_surat_id', 'id');
    }
}
