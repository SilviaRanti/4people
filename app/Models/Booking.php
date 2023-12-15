<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{

  protected $table = 'booking';
  public $timestamps = true;
  protected $fillable = [
    'pembooking',
    'no_hp',
    'tanggal_booking',
    'jam_booking',
    'id_service'
  ];

  public function service()
  {
    return $this->belongsTo(Services::class, 'id_service');
  }
}
