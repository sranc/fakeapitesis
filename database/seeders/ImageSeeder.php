<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run()
 {
  Image::truncate();

  Image::create([
   'name' => 'Alvaro Mauricio Borda Huanacio',

  ]);
 }
}