<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img');
            $table->decimal('price',10,2);
            $table->decimal('price_stock',10,2)->nullable();
            $table->string('stock');
            $table->decimal('discount_price',10,2)->nullable();
            $table->text('description');
            $table->tinyInteger('is_deal',0)->nullable();
            $table->Integer('category_id');
            $table->Integer('sub_category_id')->nullable();
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
        Schema::dropIfExists('products');
    }
}
