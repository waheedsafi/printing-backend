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
        Schema::create('werehouse_movements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('inventory_movement_id');
            $table->foreign('inventory_movement_id')->references('id')->on('inventory_movements')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('warehouse_id');
            $table->foreign('warehouse_id')->references('id')->on('werehouses')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('werehouse_movements');
    }
};
