<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class proyek extends Model
{
  protected $fillable = [
      'nama', 'deskripsi','category_id', 'target_investasi', 'min_investasi', 'deadline','foto1','foto2','foto3','foto4','user_id','lokasi',
  ];
}
