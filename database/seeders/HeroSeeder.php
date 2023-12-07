<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HeroSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'judul' => 'Capturing Timeless Moments',
        'deskripsi' => 'Cherish the joy, love, and laughter of friends moments that last a lifetime.',
        'gambar' => 'bg-header.jpg',
      ],
      [
        'judul' => 'Family Bonds, Forever Strong',
        'deskripsi' => 'Discover the beauty of togetherness and the strength found in family connections.',
        'gambar' => 'bg-header2.jpg',
      ],
      [
        'judul' => 'Celebrating Family Love',
        'deskripsi' => 'Capture the warmth and joy that family brings into every frame, creating lasting memories.',
        'gambar' => 'bg-header3.jpeg',
      ],
    ];

    DB::table('hero')->insert($data);
  }
}
