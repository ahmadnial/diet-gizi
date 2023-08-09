<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class isPulang extends Model
{
    use HasFactory;

    protected $table = 'diet-gizi';

    protected $fillable = [
        'isPulang'
    ];
}
