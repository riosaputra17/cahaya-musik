<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order', function (Blueprint $table) {
            $table->uuid('order_id')->primary();
            $table->uuid('customer_id');
            $table->uuid('jasa_id');

            $table->date('start_date');
            $table->date('end_date');
            $table->bigInteger('total_harga');
            $table->bigInteger('dp_harga');
            $table->string('payment_status')->default('pending'); // bisa juga enum kalau mau lebih ketat

            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at

            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();

            // Optional: Foreign key constraints
            $table->foreign('customer_id')->references('customer_id')->on('customers')->onDelete('cascade');
            $table->foreign('jasa_id')->references('jasa_id')->on('jasa')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};