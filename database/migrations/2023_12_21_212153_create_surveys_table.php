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
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->enum('facilities', ['verySatified', 'satified', 'neutral' , 'upset' , 'veryUpset']);
            $table->enum('organization', ['verySatified', 'satified', 'neutral' , 'upset' , 'veryUpset']);
            $table->enum('events', ['verySatified', 'satified', 'neutral' , 'upset' , 'veryUpset']);
            $table->enum('access', ['verySatified', 'satified', 'neutral' , 'upset' , 'veryUpset']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
