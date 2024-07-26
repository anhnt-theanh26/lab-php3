<?php

namespace App\Models\lab5;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gene extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
}
