<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jasa', function (Blueprint $table) {
            $table->uuid('jasa_id')->primary();
            $table->string('nama_jasa');
            $table->bigInteger('price');

            $table->text('list_services')->nullable();

            $table->timestamps(); // created_at & updated_at
            $table->softDeletes(); // deleted_at

            $table->uuid('created_by')->nullable();
            $table->uuid('updated_by')->nullable();
            $table->uuid('deleted_by')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jasa');
    }
};