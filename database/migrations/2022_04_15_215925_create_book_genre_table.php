<?php

use App\Models\Book;
use App\Models\Genre;
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
    public function up()
    {
        Schema::create('book_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Book::class);
            $table->foreignIdFor(Genre::class);
            $table->unique(['book_id', 'genre_id']);
            $table->timestamps();
            // $table->primary(['book_id', 'genre_id']);
            // $table->foreignIdFor(Book::class);
            // $table->foreignIdFor(Genre::class);
            // $table->timestamps();
      
          });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_genre');
    }
};
