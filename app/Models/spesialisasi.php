<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spesialisasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_spesialisasi',
        'tingkatan',
        'deskripsi_singkat',

    ];
    protected $primaryKey = 'spesialisasi_id';
    // protected $table = 'spesialisasis[p]';
    public $timestamps = false;



}
