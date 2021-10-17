<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_details', function (Blueprint $table) {
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('author_id')->constrained('authors');
            $table->primary(['book_id', 'author_id']);
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_details');
    }
}
