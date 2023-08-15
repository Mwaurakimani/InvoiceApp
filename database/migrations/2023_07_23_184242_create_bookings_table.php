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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('clientName');
            $table->string('clientNumber');
            $table->string('clientEmail')->nullable();
            $table->text('pickUpLocation');
            $table->datetime('pickUpTime')->nullable();
            $table->text('destination');
            $table->datetime('returnTime')->nullable();
            $table->unsignedBigInteger('vehicle_id')->nullable();
            $table->enum('fuelCoveredBy', ['Client', 'Company', 'Driver']);
            $table->decimal('price',10,0);
            $table->string('notes')->nullable();
            $table->timestamps();

            $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('set null')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
