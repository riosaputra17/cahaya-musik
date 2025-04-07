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
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('user_id')->primary();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('role'); // bisa jadi enum jika ingin membatasi (misal: admin, kasir, dll)

            $table->timestamp('created_at')->nullable();
            $table->uuid('created_by')->nullable();

            $table->timestamp('updated_at')->nullable();
            $table->uuid('updated_by')->nullable();

            $table->softDeletes(); // deleted_at
            $table->uuid('deleted_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
