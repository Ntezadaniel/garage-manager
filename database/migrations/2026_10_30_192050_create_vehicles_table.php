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
        Schema::create('vehicles', function (Blueprint $table) {
    $table->id();
    $table->foreignId('customer_id')->constrained()->restrictOnDelete();
    $table->string('plate')->unique();
    $table->string('make');
    $table->string('model');
    $table->unsignedSmallInteger('year')->nullable();
    $table->string('engine')->nullable();
    $table->unsignedInteger('mileage')->nullable();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
