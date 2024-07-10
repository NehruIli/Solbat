<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['subject', 'message', 'nama'];
    use HasFactory;
    protected $table = 'contact';
}