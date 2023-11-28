<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('amount');
            $table->unsignedBigInteger('transaction_types_id')->nullable();
            $table->foreign('transaction_types_id')->references('id')->on('transaction_types');
            $table->unsignedBigInteger('khat_type_id')->nullable();
            $table->foreign('khat_type_id')->references('id')->on('khat_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};