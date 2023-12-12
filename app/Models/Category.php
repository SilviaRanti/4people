<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  protected $fillable = ['nama', 'deskripsi'];
  public $timestamps = false;

  public function packages()
  {
    return $this->hasMany(Services::class);
  }
}
