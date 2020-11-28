<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellingServices extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('selling_services', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('id_user');
           $table->foreign('id_user')->references('id')->on('users');

           $table->unsignedBigInteger('id_commision');
           $table->foreign('id_commision')->references('id')->on('commisions');

           $table->unsignedBigInteger('id_service');
           $table->foreign('id_service')->references('id')->on('services');

           $table->float('price');
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
       Schema::dropIfExists('selling_services');
   }
}
