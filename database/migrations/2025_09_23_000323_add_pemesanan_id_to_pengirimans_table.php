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
        Schema::table('pengirimans', function (Blueprint $table) {
            $table->foreignId('pemesanan_id')->after('no_pengiriman')
                ->constrained('pemesanans')
                ->onDelete('cascade');
            $table->string('nama_pelanggan')->after('pemesanan_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengirimans', function (Blueprint $table) {
            $table->dropForeign(['pemesanan_id']);
            $table->dropColumn(['pemesanan_id', 'nama_pelanggan']);
        });
    }
};
