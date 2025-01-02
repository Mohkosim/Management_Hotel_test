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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inventory_id')->constrained(
                table: 'inventories',
                indexName: 'reservations_inventories_id'
            )->onDelete('cascade');
            $table->foreignId('guest_id')->constrained(
                table: 'guests',
                indexName: 'reservations_guests_id'
            )->onDelete('cascade');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->string('random_id')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
