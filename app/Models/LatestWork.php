<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LatestWork extends Model
{
  protected $table = 'latest_work';
  public $timestamps = false;
  protected $fillable = [
    'gambar',
  ];
}
