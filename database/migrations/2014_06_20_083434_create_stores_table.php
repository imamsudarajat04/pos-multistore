<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('code');
            $table->string('email');
            $table->string('phonenumber');
            $table->string('addressone');
            $table->string('addresstwo')->nullable();
            $table->string('postalcode');
            $table->string('city');
            $table->string('province');
            $table->string('country');
            $table->string('logo');
            $table->string('receiptheader');
            $table->string('receiptfootnotes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
