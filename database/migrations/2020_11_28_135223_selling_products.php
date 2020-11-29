<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SellingProducts extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
   public function up()
   {
       Schema::create('selling_products', function (Blueprint $table) {
           $table->id();
           $table->unsignedBigInteger('id_user');
           $table->foreign('id_user')->references('id')->on('users');

           $table->unsignedBigInteger('id_commission');
           $table->foreign('id_commission')->references('id')->on('commissions');

           $table->unsignedBigInteger('id_product');
           $table->foreign('id_product')->references('id')->on('products');

           $table->decimal('price');
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
       Schema::dropIfExists('selling_products');
   }
}
