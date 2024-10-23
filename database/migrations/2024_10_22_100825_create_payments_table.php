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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('company_name')->nullable();
            $table->string('event_name')->nullable();
            $table->string('gst_no')->nullable();
            $table->text('address')->nullable();
            $table->string('amount');
            $table->string('tds_amount')->nullable();
            $table->string('currency');
            $table->string('payment_type');
            $table->string('payment_option')->nullable();
            $table->text('order_id')->nullable();
            $table->text('transaction_id')->nullable();
            $table->string('status')->default('pending');
            $table->string('tax_invoice')->nullable();
            $table->text('form_name')->nullable();
            $table->date('billing_date')->nullable();
            $table->date('transaction_date')->nullable();
            $table->json('gateway_response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
