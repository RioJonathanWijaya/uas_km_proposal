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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('submitter_id')->constrained('users');
            $table->string('title');
            $table->string('pdf');
            $table->date('tanggal_kegiatan_mulai');
            $table->date('tanggal_kegiatan_selesai');
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->string('tempat_kegiatan');
            $table->string('pelaksana_kegiatan');
            $table->string('status')->default('Pending');
            $table->foreignId('baka_id')->nullable()->constrained('users');
            $table->foreignId('wr3_id')->nullable()->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
