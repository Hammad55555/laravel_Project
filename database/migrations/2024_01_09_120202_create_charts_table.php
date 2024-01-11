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
        Schema::create('charts', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->decimal('starting_amount', 10, 2)->nullable();
            $table->decimal('annual_contribution', 10, 2)->nullable();
            $table->decimal('total_contribution', 10, 2)->nullable();
            $table->decimal('interest_earned', 10, 2)->nullable();
            $table->decimal('total_interest_earned', 10, 2)->nullable();
            $table->decimal('End_balance', 10, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charts');
    }
};
