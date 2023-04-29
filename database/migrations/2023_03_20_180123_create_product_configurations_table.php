<?php

use App\Models\VariationOption;
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
        Schema::create('product_configuration', function (Blueprint $table) {
            // $table->foreignIdFor(VariationOption::class, 'variation_id');
            $table->foreignIdFor(VariationOption::class, 'variation_option_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_configurations');
    }
};
