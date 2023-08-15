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
            $table->string('Name')->nullable();
            $table->string('Registration_number');
            $table->string('make');
            $table->integer('engine_size');
            $table->enum('transmission',['Automatic','Manual','Semi-Auto']);
            $table->decimal('fuel_capacity',15,2);
            $table->integer('odometer_reading')->nullable();
            $table->integer('seats')->nullable();
            $table->enum('status',['Active','Inactive'])->default('Active');
            $table->text('Notes')->nullable();
            $table->string('image_path')->nullable();
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
