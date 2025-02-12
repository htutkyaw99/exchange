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
        Schema::create('favourite_conversions', function (Blueprint $table) {
            $table->id();
            $table->string('from');
            $table->string('to');
            $table->string('amount');
            $table->string('result');
            $table->string('current_rate');
            $table->string('reverse_rate');
            $table->string('date');
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favourite_conversions');
    }
};
