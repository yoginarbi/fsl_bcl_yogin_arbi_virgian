<?php

namespace App\Models;

use App\Models\Armada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemesanan extends Model
{
    protected $fillable = [
        'nama_pelanggan',
        'armada_id',
        'jenis_kendaraan',
        'tgl_pemesanan',
        'detail_barang',
        'status',
    ];

    protected $casts = [
        'detail_barang' => 'array',
        'tgl_pemesanan' => 'datetime',
    ];

    public function armada(): BelongsTo
    {
        return $this->belongsTo(Armada::class);
    }
}
