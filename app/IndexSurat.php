<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Suratmasuk;

class IndexSurat extends Model
{
    protected $tabel = 'index_surats';
    protected $guarded = [];

    public function suratMasuk()
    {
        return $this->hasMany(Suratmasuk::class, 'index_surat_id', 'id');
    }
}
