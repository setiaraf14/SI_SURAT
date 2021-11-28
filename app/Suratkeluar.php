<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\IndexSurat;

class Suratkeluar extends Model
{
    protected $table = "suratkeluars";
    protected $guarded = [];

    public function indexSurat()
    {
        return $this->belongsTo(IndexSurat::class,'index_surat_id', 'id');
    }
}
