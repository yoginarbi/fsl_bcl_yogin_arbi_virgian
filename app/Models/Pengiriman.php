<?php

namespace App\Models;

use App\Models\Armada;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengiriman extends Model
{
    protected $table = 'pengirimans';
    protected $fillable = [
        'no_pengiriman',
        'tgl_kirim',
        'lokasi_asal',
        'lokasi_tujuan',
        'status',
        'detail_barang',
        'armada_id',
    ];

    protected $casts = [
        'tgl_kirim' => 'datetime',
        'detail_barang' => 'array',
    ];

    public function armada(): BelongsTo
    {
        return $this->belongsTo(Armada::class);
    }
}
