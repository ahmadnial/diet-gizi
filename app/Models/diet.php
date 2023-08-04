<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class diet extends Model
{
    use HasFactory;

    protected $table = 'diet-gizi';

    protected $fillable = [
        'bed', 'nama', 'pasienID', 'DPJP', 'diet_pagi', 'diet_pagi_konsistensi', 'diet_siang', 'diet_siang_konsistensi', 'diet_sore', 'diet_sore_konsistensi'
    ];
}
