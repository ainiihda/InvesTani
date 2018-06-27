<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class investasi extends Model
{
    protected $fillable = [
        'jml_investasi', 'jml_keuntungan','user_id', 'proyek_id', 'status', 'no_rekening', 'konfirmasi'
    ];
}
