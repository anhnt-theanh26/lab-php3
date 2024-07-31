<?php

namespace App\Models\Asm;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'color_id',
        'ram_id',
        'price',
        'quantity',
    ];
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function color(){
        return $this->belongsTo(Color::class);
    }
    public function ram(){
        return $this->belongsTo(Ram::class);
    }
}
