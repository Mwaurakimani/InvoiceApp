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
        Schema::create('model_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('model_type');
            $table->enum('transaction_type',['revenue','expense']);
            $table->unsignedBigInteger('model_id');
            $table->foreignId('transaction_id')
                ->nullable()
                ->constrained('transactions')
                ->onDelete('set null')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('model_transactions');
    }
};
