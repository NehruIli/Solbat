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
            $table->id('user_id');
            $table->string('NIK');
            $table->string('nama_depan' , 16);
            $table->string('nama_belakang' ,16);
            $table->string('username' ,16)->unique();
            $table->string('email' ,30)->unique();
            $table->timestamp('email__at')->nullable();
            $table->string('password');
            $table->string('spesialisasi' ,45);
            $table->string('no_telepon' ,16);
            $table->string('alamat' ,50);
            $table->string('pekerjaan' ,50);
            $table->string('img_user');
            $table->string('kemampuan_detail')->nullable();
            $table->string('spesialisasi_1')->nullable();
            $table->string('spesialisasi_2')->nullable();
            $table->string('spesialisasi_3')->nullable();
            $table->integer('rating')->nullable();
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
