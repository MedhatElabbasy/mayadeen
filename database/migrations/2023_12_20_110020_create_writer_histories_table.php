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
        Schema::create('writer_histories', function (Blueprint $table) {
            $table->id();
            $table->char('title');
            $table->string('description');
            $table->longText('content');
            $table->char('auther_name');
            $table->text('about_auther');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('writer_histories');
    }
};
