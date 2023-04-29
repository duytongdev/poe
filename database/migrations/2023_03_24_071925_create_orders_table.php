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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->date('ship_date');
            $table->string('ship_address');
            $table->string('shipping_method', 100);
            $table->string('payment_method', 100);
            $table->string('payment_status', 100)->default('unpaid');
            $table->decimal('total', 8, 2);
            $table->string('status', 100)->default('processing');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
