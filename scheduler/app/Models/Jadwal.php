<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $table = 'jadwal';

    protected $fillable = [
        'user_id',
        'status_id',
        'judul',
        'deskripsi',
        'lokasi',
        'tanggal',
        'jam_mulai',
        'jam_selesai'
    ];

    public function getUser()
    {
        return $this->belongsTo(User::class);
    }

    public function getStat()
    {
        return $this->belongsTo(Status::class);
    }
}
