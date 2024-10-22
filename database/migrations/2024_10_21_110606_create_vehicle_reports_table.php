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
        Schema::create('vehicle_reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->text('table_title')->nullable();
            $table->text('graph_title')->nullable();
            $table->year('year')->nullable();
            $table->text('table')->nullable();
            $table->text('graph')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_reports');
    }
};
