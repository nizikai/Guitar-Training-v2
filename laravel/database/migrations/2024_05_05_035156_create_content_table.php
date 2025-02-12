<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CONTENT', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('song_id');
            $table->foreign('song_id')->references('id')->on('SONG');
            $table->string('part');
            $table->text('content');
            $table->boolean('deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CONTENT');
    }
};