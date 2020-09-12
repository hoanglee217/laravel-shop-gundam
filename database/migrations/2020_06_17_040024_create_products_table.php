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
            $table->increments('id');
            $table->integer('catalog_id');
            $table->string('name');
            $table->integer('qty');
            $table->enum('status', ['new', 'sale', 'sold'])->nullable()->default('new');
            $table->string('price');
            $table->string('discount')->nullable()->default(0);
            $table->string('thumbnail');
            $table->text('images')->nullable();
            $table->string('views')->nullable()->default(0);
            $table->text('content')->nullable();
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
        Schema::dropIfExists('types');
    }
}
