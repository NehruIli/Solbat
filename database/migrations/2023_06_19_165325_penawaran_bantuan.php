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
        Schema::create('penawaran_bantuans', function (Blueprint $table) {
            $table->id('penawaran_bantuan_id');
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->foreignId('bantuan_id')->references('bantuan_id')->on('bantuans');
            $table->string('biaya_penawaran');
            $table->string('status');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penawaran_bantuans');
    }
};
