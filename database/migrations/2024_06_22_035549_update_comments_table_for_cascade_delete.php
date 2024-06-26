<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::table('comments', function (Blueprint $table) {

            $table->dropForeign(['tweet_id']);

            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade');
        });
    }

    
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropForeign(['tweet_id']);

            $table->foreign('tweet_id')->references('id')->on('tweets');
        });
    }
};
