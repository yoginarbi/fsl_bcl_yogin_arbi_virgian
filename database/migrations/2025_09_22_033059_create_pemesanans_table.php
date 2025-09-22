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
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan');
            $table->foreignId('armada_id')->constrained('armadas')->onDelete('cascade');
            $table->string('jenis_kendaraan')->index();
            $table->timestamp('tgl_pemesanan');
            $table->json('detail_barang');
            $table->string('status')
                ->default('pending')
                ->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
