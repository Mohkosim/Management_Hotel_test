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
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unit_id')->constrained(
                table: 'units',
                indexName: 'inventories_units_id'
            )->onDelete('cascade');
            $table->foreignId('unit_group_id')->constrained(
                table: 'unit_groups',
                indexName: 'inventories_unit_groups_id'
            )->onDelete('cascade');
            $table->foreignId('rate_plan_id')->constrained(
                table: 'rate_plans',
                indexName: 'inventories_rate_plans_id'
            )->onDelete('cascade');
            // $table->unsignedBigInteger('rate_plan_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
