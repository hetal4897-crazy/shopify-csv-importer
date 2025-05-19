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
        Schema::create('imported_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('import_file_id')->constrained()->onDelete('cascade');
            $table->string('shopify_product_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('vendor')->nullable();
            $table->text('product_type')->nullable();
            $table->text('tags')->nullable();
            $table->text('published')->nullable();
            $table->text('sku')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->decimal('compare_price', 10, 2)->nullable();
            $table->text('required_shipping')->nullable();
            $table->text('texable')->nullable();
            $table->text('tracker')->nullable();
            $table->text('qty')->nullable();
            $table->text('weight')->nullable();
            $table->text('weight_unit')->nullable();
            $table->text('policy')->nullable();
            $table->text('image')->nullable();
            $table->text('fulfillment_service')->nullable();
            $table->string('status')->default('pending'); // pending, success, failed
            $table->text('error_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imported_products');
    }
};
