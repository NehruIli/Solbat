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
        Schema::create('bantuans_spesialisasis', function (Blueprint $table) {
            $table->unsignedBigInteger('bantuan_id');
            $table->unsignedBigInteger('spesialisasi_id');
            $table->foreign('bantuan_id')->references('bantuan_id')->on('bantuans')->onDelete('cascade');
            $table->foreign('spesialisasi_id')->references('spesialisasi_id')->on('spesialisasis')->onDelete('cascade');
            $table->primary(['bantuan_id', 'spesialisasi_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuans_spesialisasis');
    }
};
