<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IndexSurat;

class Suratmasuk extends Model
{
    protected $table = 'suratmasuks';
    protected $guarded = [];

    public function indexSurat()
    {
        return $this->belongsTo(IndexSurat::class,'index_surat_id', 'id');
    }
}
