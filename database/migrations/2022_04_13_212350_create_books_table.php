<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Ramsey\Uuid\Type\Integer;

return new class extends Migration
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
            $table->string('title',255);
            $table->string('authors',255);
            $table->string('description')->nullable();
            $table->date('released_at')->nullable();
            $table->string('cover_image',255)->nullable();
            $table->integer('pages');
            $table->string('language_code',3)->default('HU'); 
            $table->string('isbn', 13)->unique()->nullable();
            $table->Integer('in_stock');
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
        Schema::dropIfExists('books');
    }
};
