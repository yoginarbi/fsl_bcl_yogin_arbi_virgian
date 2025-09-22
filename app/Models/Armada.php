<?php

namespace App\Models;

use App\Models\Pemesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Armada extends Model
{
    use HasFactory;
    protected $fillable = ['no_armada', 'jenis', 'kapasitas_kg', 'tersedia'];

    public function pemesanans(): HasMany
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function pengirimans(): HasMany
    {
        return $this->hasMany(Pengiriman::class);
    }
    public function checkins(): HasMany
    {
        return $this->hasMany(Checkin::class);
    }

    protected $casts = [
        'kapasitas_kg' => 'integer',
        'tersedia' => 'boolean',
    ];
}
