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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('code', 100)->unique();
            $table->string('discount_type', 100);
            $table->integer('discount_amount')->default(1);
            $table->decimal('minimum_purchase_amount', 8, 2)->nullable();
            $table->decimal('maximum_discount_amount', 8, 2);
            $table->dateTime('expiration_date')->nullable();
            $table->integer('usage_limit_per_coupon')->default(1);
            $table->integer('usage_limit_per_user')->default(1);
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
