<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductVariantPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_variant', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_8816810')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('variant_id');
            $table->foreign('variant_id', 'variant_id_fk_8816810')->references('id')->on('variants')->onDelete('cascade');
        });
    }
}
