<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penawaran_bantuan extends Model
{
    protected $fillable = ['user_id', 'nama', 'bantuan_id', 'biaya_penawaran', 'status'];
    protected $primaryKey = 'penawaran_bantuan_id';
    use HasFactory;

    public $timestamps=false;

    public function bantuan(){
        return $this->belongsTo(bantuan::class, 'bantuan_id', 'bantuan_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}
