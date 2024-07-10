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
        Schema::create('bantuans', function (Blueprint $table) {
            $table->id('bantuan_id');
            //$table->integer('user_id');
            // $table->string('nama');
            $table->integer('transaksi_id')->nullable();
            $table->integer('biaya');
            $table->string('bantuan', 30);
            // $table->date('tanggal');
            $table->string('img_bantuan');
            $table->string('detail_bantuan');
            $table->string('almt_bantuan');
            $table->string('durasi');
            $table->string('jenis_durasi');
            $table->string('jenis_bantuan');
            $table->foreignId('user_id')->references('user_id')->on('users');
            $table->timestamps();
            $table->string('status')->default('Pending');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuans');
    }
};
