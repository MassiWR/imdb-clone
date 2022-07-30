<?php

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
        Schema::table('watchlist', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained()->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('movie_id')->constrained()->onDelete('restrict');
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->foreignId('watchlist_id')->references('id')->on('watchlist')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
};
