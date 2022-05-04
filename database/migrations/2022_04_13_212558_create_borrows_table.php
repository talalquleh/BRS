<?php

use App\Models\Book;
use App\Models\User;
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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Book::class);
            $table->enum('status',['PENDING','ACCEPTED','REJECTED','RETURNED']);
            $table->dateTime('request_processed_at')->nullable(); 
            $table->unsignedBigInteger('request_managed_by');
            $table->foreign('request_managed_by')->references('id')->on('users')->onDelete('cascade');
            $table->dateTime('deadline')->nullable();
            $table->dateTime('returned_at')->nullable();
            $table->unsignedBigInteger('return_managed_by');
            $table->foreign('return_managed_by')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('borrows');
    }
};
