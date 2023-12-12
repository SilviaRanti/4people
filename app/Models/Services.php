<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table = 'services';
    public $timestamps = false;
    protected $fillable = [
        'category_id',
        'nama',
        'harga',
        'deskripsi'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
