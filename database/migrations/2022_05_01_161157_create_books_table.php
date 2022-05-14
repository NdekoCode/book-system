<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            // Identifiant Unique du livre
            $table->string('ISBN', 60);
            $table->string('name', 100);
            $table->string('description', 250);
            $table->string('image_desc');
            $table->float('price');
            $table->timestamps();
            $table->foreignId('author_id')->constained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
