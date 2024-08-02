<?php

namespace App\Http\Controllers\asm;

use App\Http\Controllers\Controller;
use App\Models\asm\Category;
use App\Models\Asm\Color;
use App\Models\asm\Image;
use App\Models\Asm\Product;
use App\Models\asm\ProductColor;
use App\Models\Asm\ProductDetail;
use App\Models\Asm\Ram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            ->join('product_colors', 'product_colors.color_id', '=', 'colors.id')
            ->where('product_colors.product_id', $id)
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
    // danh mục
    public function listCate()
    {
        $categories = Category::orderByDesc('id')->paginate(5);
        return view('test.admin.catelist', compact('categories'));
    }


    public function formAddCate()
    {
        $categories = Category::all();
        return view('test.admin.cateadd', compact('categories'));
    }

    public function addCate(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);
        Category::create($data);
        return redirect()->route('/')->with('addCate', 'Thêm mới danh mục thành công');
    }

    public function formUpdateCate(Category $cate)
    {
        return view('test.admin.cateupdate', compact('cate'));
    }

    public function updateCate(Request $request, Category $cate)
    {
        $data = $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
        ]);
        $cate->update($data);
        return redirect()->route('/')->with('updateCate', 'Cập nhật danh mục thành công');
    }

    public function deleteCate(Category $cate)
    {
        $cate->delete();
        return redirect()->route('/')->with('deleteCate', 'Xóa danh mục thành công');
    }
    // sản phẩm
    public function products()
    {
        $products = Product::paginate(8);
        return view('test.admin.prdlist', compact('products'));
    }

    public function formAddUpdate(Product $product)
    {
        // dd($product);
        $categories = Category::all();
        $rams = Ram::all();
        $colors = Color::all();
        $productsDetails = ProductDetail::where('product_id', $product->id)->get();
        $productColors = ProductColor::where('product_id', $product->id)->get();
        $images = Image::where('product_id', $product->id)->get();
        // dd($productColors);
        return view('test.admin.prdupdate', compact('product', 'productsDetails', 'categories', 'rams', 'colors', 'productColors', 'images'));
    }


    public function updatePrd(Request $request, Product $product)
    {
        // Xác thực dữ liệu
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'views' => 'nullable|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'colors.*' => 'integer|exists:colors,id',
            'products.*.id' => 'required|exists:product_details,id',
            'products.*.price' => 'required|numeric|min:0',
            'products.*.quantity' => 'required|integer|min:0',
            'imagesL.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Xử lý hình ảnh chính
        $data = $request->except('image');
        $old_image = $product->image;

        if ($request->hasFile('image')) {
            $path_image = $request->file('image')->store('images');
            $data['image'] = $path_image;

            // Xóa hình ảnh cũ
            if ($old_image && file_exists(storage_path('image/' . $old_image))) {
                unlink(storage_path('image/' . $old_image));
            }
        }

        // Cập nhật thông tin sản phẩm
        $product->update($data);

        // Xử lý màu sắc
        if ($request->has('colors')) {
            $colors = $request->input('colors', []);
            $product->colors()->sync($colors);
        }

        // Cập nhật chi tiết sản phẩm
        if ($request->has('products')) {
            $productsDetails = $request->input('products');
            foreach ($productsDetails as $details) {
                $productDetail = ProductDetail::find($details['id']);
                if ($productDetail) {
                    $productDetail->update([
                        'price' => $details['price'],
                        'quantity' => $details['quantity'],
                    ]);
                }
            }
        }

        if ($request->hasFile('imagesL')) {
            $images_olds = Image::where('product_id',  $product->id)->get();
            foreach ($images_olds as $image) {
                // Xóa hình ảnh khỏi hệ thống tệp
                $path_image = storage_path($image->url);
                if (file_exists($path_image)) {
                    unlink($path_image);
                }
            }
            Image::where('product_id', $product->id)->delete();
            foreach ($request->file('imagesL') as $image) {
                $path_image = $image->store('image');
                Image::create([
                    'product_id' => $product->id,
                    'url' => $path_image,
                ]);
            }
        }
        return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công.');
    }


    public function formAddPrd()
    {
        $categories = Category::all();
        $colors = Color::all();
        $rams = Ram::all();
        return view('test.admin.prdadd', compact('categories', 'colors', 'rams'));
    }

    // public function updatePrd(Request $request, Product $product)
    // {
    //     // Xác thực dữ liệu
    //     $data = $request->except('image');
    //     $old_image = $product['image'];
    //     if ($request->hasFile('image')) {
    //         $path_image  =  $request->file('image')->store('image');
    //         $data['image'] = $path_image;
    //     }
    //     $product->update($data);
    //     if (isset($path_image)) {
    //         if (file_exists('storage/' . $old_image)) {
    //             unlink('storage/' . $old_image);
    //         }
    //     }

    //     if ($request->has('colors')) {
    //         $colors = $request->input('colors', []);
    //         $product->colors()->sync($colors);
    //     }

    //     if ($request->has('products')) {
    //         $productsDetails = $request->input('products');
    //         foreach ($productsDetails as $details) {
    //             $productDetail = ProductDetail::find($details['id']);
    //             if ($productDetail) {
    //                 $productDetail->update([
    //                     'price' => $details['price'],
    //                     'quantity' => $details['quantity'],
    //                 ]);
    //             }
    //         }
    //     }

    //     // // Xử lý hình ảnh bổ sung
    //     if ($request->hasFile('imagesL')) {
    //         $images_olds = Image::where('product_id',  $product->id)->get();
    //         foreach ($images_olds as $image) {
    //             // Xóa hình ảnh khỏi hệ thống tệp
    //             $path_image = storage_path( $image->url);
    //             if (file_exists($path_image)) {
    //                 unlink($path_image);
    //             }
    //         }
    //         Image::where('product_id', $product->id)->delete();
    //         foreach ($request->file('imagesL') as $image) {
    //             $path_image = $image->store('image');
    //             Image::create([
    //                 'product_id' => $product->id,
    //                 'url' => $path_image,
    //             ]);
    //         }
    //     }


    //     return redirect()->back()->with('success', 'Cập nhật sản phẩm thành công.');
    // }
}
