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
        Schema::create('pengirimans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pengiriman')->unique();
            $table->timestamp('tgl_kirim');
            $table->string('lokasi_asal')->index();
            $table->string('lokasi_tujuan')->index();
            $table->string('status')->default('tertunda')->index();
            $table->json('detail_barang');
            $table->foreignId('armada_id')->constrained('armadas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengirimen');
    }
};
