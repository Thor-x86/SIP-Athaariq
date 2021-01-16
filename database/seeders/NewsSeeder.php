<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('news')->insert([
      'user_id' => 1,
      'title' => 'Lorem Ipsum',
      'content' =>
        '<img src="https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ">'
        . '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis tincidunt leo sed bibendum. Morbi tellus diam, consequat at diam nec, imperdiet dignissim sapien. Sed sit amet sodales quam. Duis auctor auctor tempor. Suspendisse eu tempor lacus. In pretium augue non malesuada ornare. Pellentesque egestas efficitur turpis vel vehicula. Nullam quis enim lectus. Fusce tortor sapien, bibendum at magna ac, vestibulum mollis sapien. Aenean mattis aliquet hendrerit. Praesent hendrerit porttitor fringilla. Integer sagittis erat vel orci ultricies, in sollicitudin dui interdum. Morbi tempus auctor vehicula.</p>',
    ]);
    DB::table('news')->insert([
      'user_id' => 1,
      'title' => 'Dolor Amet',
      'content' =>
        '<img src="https://www.humanesociety.org/sites/default/files/styles/2000x850/public/2020-07/kitten-510651.jpg?h=f54c7448&itok=lJefJMMQ">'
        . '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque convallis tincidunt leo sed bibendum. Morbi tellus diam, consequat at diam nec, imperdiet dignissim sapien. Sed sit amet sodales quam. Duis auctor auctor tempor. Suspendisse eu tempor lacus. In pretium augue non malesuada ornare. Pellentesque egestas efficitur turpis vel vehicula. Nullam quis enim lectus. Fusce tortor sapien, bibendum at magna ac, vestibulum mollis sapien. Aenean mattis aliquet hendrerit. Praesent hendrerit porttitor fringilla. Integer sagittis erat vel orci ultricies, in sollicitudin dui interdum. Morbi tempus auctor vehicula.</p>',
    ]);
  }
}
