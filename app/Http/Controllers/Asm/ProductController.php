<?php

namespace App\Http\Controllers\asm;

use App\Http\Controllers\Controller;
use App\Models\asm\Category;
use App\Models\Asm\Color;
use App\Models\asm\Image;
use App\Models\Asm\Product;
use App\Models\Asm\ProductDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    public function index()
    {
        $products = Product::paginate(8);
        $productDetails = $productDetails = DB::table('product_details')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->select(DB::raw('MIN(product_details.price) AS price'), 'product_details.product_id AS product_id')
            ->groupBy('product_details.product_id')
            ->get();

        // ProductDetail::whereIn('id', function ($query) {
        //     $query->select(DB::raw('MIN(pd_inner.id)'))
        //         ->from('product_details as pd_inner')
        //         ->groupBy('pd_inner.product_id');
        // })->get();
        $category = Category::all();
        // dd($productDetails);
        return view('test.index', compact('products', 'category', 'productDetails'));
    }

    public function detail($id)
    {
        $product = Product::find($id);
        // $productDetails = ProductDetail::where('product_id', $id)->get();
        $images = Image::where('product_id', $id)->get();
        $category = Category::all();
        $colors = Color::select('colors.*')
            ->join('product_color', 'product_color.color_id', '=', 'colors.id')
            ->where('product_color.product_id', $id)
            ->get();
        $rams = ProductDetail::select('rams.*', 'product_details.id AS idpdt')
            ->join('rams', 'product_details.ram_id', '=', 'rams.id')
            ->where('product_details.product_id', $id)
            ->get();
        $firstRamPrice = ProductDetail::select('product_details.price')
            ->join('rams', 'product_details.ram_id', '=', 'rams.id')
            ->where('product_details.product_id', $id)
            ->first();
        return view('test.detail', compact('product', 'images', 'category', 'colors', 'rams', 'firstRamPrice'));
    }

    public function updatePrice(Request $request)
    {
        $idpdt = $request->input('idpdt');

        $productDetail = ProductDetail::find($idpdt);

        if ($productDetail) {
            return response()->json($productDetail->price);
        }

        return response()->json(0);
    }

    public function allPrd()
    {
        $products = Product::all();
        $productDetails = ProductDetail::whereIn('id', function ($query) {
            $query->select(DB::raw('MIN(pd_inner.id)'))
                ->from('product_details as pd_inner')
                ->groupBy('pd_inner.product_id');
        })->get();

        $category = Category::all();
        // dd($productDetails);
        return view('test.products', compact('products', 'category', 'productDetails'));
    }

    public function prdCate($id)
    {
        $category = Category::all();
        $products = Product::where('category_id', $id)->get();
        $nameCate = Category::find($id);
        // $productDetails = ProductDetail::query()
        //     ->join('products', 'products.id', 'product_details.product_id')
        //     ->where('products.category_id', $id)
        //     ->whereIn('product_details.id', function ($query) {
        //         $query->select(DB::raw('MIN(pd_inner.id)'))
        //             ->from('product_details as pd_inner')
        //             ->groupBy('pd_inner.product_id');
        //     })->get();
        $productDetails = DB::table('product_details')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->select(DB::raw('MIN(product_details.price) AS price'), 'product_details.product_id AS product_id')
            ->where('products.category_id', $id)
            ->groupBy('product_details.product_id')
            ->get();

        // return $productDetails;
        return view('test.products-cate', compact('products', 'category', 'productDetails', 'nameCate'));
    }

    public function search(Request $request)
    {
        $category = Category::all();
        $search = $request->input('search');
        $products = Product::where('products.name', 'LIKE', "%{$search}%")->get();
        $productDetails = DB::table('product_details')
            ->join('products', 'products.id', '=', 'product_details.product_id')
            ->select(DB::raw('MIN(product_details.price) AS price'), 'product_details.product_id AS product_id')
            ->where('products.name', 'LIKE', "%{$search}%")
            ->groupBy('product_details.product_id')
            ->get();

        return view('test.search', compact('products', 'category', 'productDetails', 'search'));
    }
}
