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
        Schema::create('regulatory_standards', function (Blueprint $table) {
            $table->id();
            $table->date('meeting_date');
            $table->text('meeting_time');
            $table->longText('subject');
            $table->longText('place');
            $table->longText('meeting_notice_link');
            $table->longText('meeting_minutes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regulatory_standards');
    }
};
