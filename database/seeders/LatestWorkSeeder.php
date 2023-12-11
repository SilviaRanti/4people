<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LatestWorkSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'gambar' => 'works1.jpeg',
      ],
      [
        'gambar' => 'works2.jpeg',
      ],
      [
        'gambar' => 'works3.jpeg',
      ],
      [
        'gambar' => 'works4.jpeg',
      ],
      [
        'gambar' => 'works5.jpeg',
      ],
      [
        'gambar' => 'works6.jpeg',
      ],
    ];

    DB::table('latest_work')->insert($data);
  }
}
