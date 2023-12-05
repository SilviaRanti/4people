<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'nama' => 'Super Admin',
        'username' => 'superadmin123',
        'password' => Hash::make('superadmin123'),
        'role' => 1,
      ],
      [
        'nama' => 'Admin',
        'username' => 'admin123',
        'password' => Hash::make('admin123'),
        'role' => 2,
      ],
    ];

    DB::table('admins')->insert($data);
  }
}
