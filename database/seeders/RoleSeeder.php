<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('roles')->insert([
      'label' => 'admin',
      'is_curator' => true,
    ]);
    DB::table('roles')->insert([
      'label' => 'public',
      'is_curator' => false,
    ]);
  }
}
