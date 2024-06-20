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
        Schema::create('sales', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('store_id')
                ->constrained('stores')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignUuid('customer_id')
                ->constrained('customers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete()
                ->nullable();
            $table->foreignUuid('cashier_shift_id')
                ->constrained('cashier_shifts')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->decimal('total', 10, 2);
            $table->decimal('discount', 10, 2)
                ->default(0)
                ->nullable();
            $table->decimal('tax', 10, 2)
                ->default(0)
                ->nullable();
            $table->enum('payment_method', ['cash', 'credit_card', 'debit_card']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
