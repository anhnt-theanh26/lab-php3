<?php

namespace App\Models\lab5;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moive extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'poster',
        'intro',
        'release_date',
        'genre_id',
    ];
}
