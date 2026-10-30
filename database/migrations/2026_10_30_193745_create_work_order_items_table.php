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
       Schema::create('work_order_items', function (Blueprint $table) {
    $table->id();
    $table->foreignId('work_order_id')->constrained()->cascadeOnDelete();
    $table->string('type'); // part, labour or outsourced
    $table->string('description');
    $table->decimal('quantity', 8, 2)->default(1);
    $table->unsignedBigInteger('unit_price');          // what you charge
    $table->unsignedBigInteger('unit_cost')->default(0); // cash that leaves your pocket
    $table->unsignedBigInteger('time_value')->default(0); // fair value of your own time on this line
    $table->foreignId('performed_by')->nullable()->constrained('users')->nullOnDelete();
    $table->string('worker_name')->nullable();          // outside specialists
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_order_items');
    }
};
