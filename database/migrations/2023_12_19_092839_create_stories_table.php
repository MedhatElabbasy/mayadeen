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
        Schema::create('stories', function (Blueprint $table) {
            $table->id();
            $table->char('title')->nullable();
            $table->string('description')->nullable();
            $table->longText('content')->nullable();


            $table->string('w1_name')->nullable();
            $table->string('w1_number')->nullable();
            $table->string('w1_email')->nullable()->unique();

            $table->string('w2_name')->nullable();
            $table->string('w2_number')->nullable();
            $table->string('w2_email')->nullable()->unique();

            $table->string('w3_name')->nullable();
            $table->string('w3_number')->nullable();
            $table->string('w3_email')->nullable()->unique();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stories');
    }
};