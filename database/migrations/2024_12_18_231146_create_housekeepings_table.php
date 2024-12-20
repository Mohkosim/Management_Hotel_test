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
        Schema::create('housekeepings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained(
                table: 'units',
                indexName: 'housekeepings_units_id'
            )->onDelete('cascade');
            $table->enum('current_condition', ['clean','Inspect', 'dirty']);
            $table->string('current_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('housekeepings');
    }
};
