<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 /**
  * Run the migrations.
  *
  * @return void
  */
 /**
  * The function creates a table called images with the following columns: id, name, imageFront,
  * imageLeft, imageRight, created_at, and updated_at
  */
 public function up()
 {
  Schema::create('images', function (Blueprint $table) {
   $table->id();
   $table->string("name");
   $table->string("imageFront");
   $table->string("imageLeft");
   $table->string("imageRight");
   $table->timestamps();
  });
 }

 /**
  * Reverse the migrations.
  *
  * @return void
  */
 public function down()
 {
  Schema::dropIfExists('images');
 }
};