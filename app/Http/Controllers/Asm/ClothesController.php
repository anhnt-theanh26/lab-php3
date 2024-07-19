<?php

namespace App\Http\Controllers\Asm;

use App\Http\Controllers\Controller;
use App\Models\asm\Category;
use App\Models\Asm\Clothes;
use App\Models\asm\Image;
use Illuminate\Http\Request;

class ClothesController extends Controller
{
    //
    public function index()
    {
        $clothes = Clothes::paginate(8);
        $cate = Category::all();
        $sold = Clothes::query()->orderByDesc('sold')->limit(4)->get();
        return view('asm.index', compact('clothes', 'cate', 'sold'));
    }

    public function detail($id)
    {
        $clothes = Clothes::find($id);
        $cate = Category::all();
        $images = Image::query()->where('clothes_id', $id)->get();
        $sameClothes = Clothes::query()
        ->where('category_id', $clothes->category_id)
        ->whereNotIn('id', [$clothes->id])
        ->limit(4)
        ->get();
        return view('asm.detail', compact('clothes', 'cate', 'images', 'sameClothes'));
    }

    public function products()
    {
        $clothes = Clothes::all();
        $cate = Category::all();
        return view('asm.products', compact('clothes', 'cate'));
    }

    public function products_cate($id)
    {
        $clothes = Clothes::query()->where('category_id', $id)->get();
        $cate = Category::all();
        $namecate = Category::find($id);
        return view('asm.products-cate', compact('clothes', 'cate', 'namecate'));
    }
}
