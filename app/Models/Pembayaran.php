<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{

  protected $table = 'pembayaran';

  protected $fillable = [
    'id_booking',
    'id_service',
    'external_id',
    'nama',
    'harga',
    'status'
  ];

  public function booking()
  {
    return $this->belongsTo(Booking::class, 'id_booking');
  }

  public function service()
  {
    return $this->belongsTo(Services::class, 'id_service');
  }
}
