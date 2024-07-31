<?php

namespace App\Models\Asm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'quantity',
        'price_old',
        'price_new',
        'sold',
        'image_url',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
