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
        Schema::create('mileages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trip_id')->constrained('trips')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users');;
            $table->decimal('reading',15,2,)->default(0);
            $table->enum('mileage_at',['Start','Pause','Resume','End']);
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mileages');
    }
};
