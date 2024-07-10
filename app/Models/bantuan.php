<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bantuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'durasi',
        'jenis_durasi',
        'transaksi_id',
        'biaya',
        'bantuan',
        'img_bantuan',
        'detail_bantuan',
        'almt_bantuan',
        'jenis_bantuan',
        'status'];
    protected $primaryKey = 'bantuan_id';
    // public $timestamps=false;
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}

