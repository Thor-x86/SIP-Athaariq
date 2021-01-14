<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('users')->insert([
      'name' => 'Admin',
      'email' => 'admin@example.com',
      'role_id' => 1,
      'email_verified_at' => now(),
      'password' => Hash::make('12345678'),
    ]);
    DB::table('users')->insert([
      'name' => 'John Doe',
      'email' => 'johndoe@example.com',
      'role_id' => 2,
      'email_verified_at' => now(),
      'password' => Hash::make('12345678'),
    ]);
  }
}
