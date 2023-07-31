<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariantsTable extends Migration
{
    public function up()
    {
        Schema::create('variants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sap_product_code')->nullable();
            $table->string('web_product_code')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
        });
    }
}
