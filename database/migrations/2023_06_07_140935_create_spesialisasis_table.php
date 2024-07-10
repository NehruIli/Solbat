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
        Schema::create('spesialisasis', function (Blueprint $table) {
            $table->id('spesialisasi_id');
            $table->foreignId('user_id')->nullable();
            $table->string('nama_spesialisasi');
            $table->string('tingkatan');
            $table->string('deskripsi_singkat');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spesialisasis');
    }
};
