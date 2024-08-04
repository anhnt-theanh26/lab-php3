<?php

namespace App\Http\Controllers\asm;

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
        // dd($clothes);
        $cate = Category::all();
        $sold = Clothes::query()->orderByDesc('sold')->limit(4)->get();
        return view('asm.index', compact('clothes', 'cate', 'sold'));
    }

    public function detail($id)
    {
        $clothes = Clothes::find($id);
        $cate = Category::all();
        $images = Image::where('product_id', '=', $id)->get();
        $sameClothes = Clothes::where('category_id', '=', $clothes->category_id)
            ->where('id', '!=', $id)
            ->limit(4)->get();
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

    public function search(Request $request)
    {
        $search = $request->input('search');
        $clothes = Clothes::where('name', 'LIKE', "%{$search}%")->get();
        // dd($clothes);
        $cate = Category::all();
        return view('asm.search', compact('clothes', 'cate', 'search'));
    }

    public function categories()
    {
        $categories = Category::all();
        return view('asm.admin.cateList', compact('categories'));
    }
    public function cateFormUpdate(Category $cate)
    {
        return view('asm.admin.cateUpdate', compact('cate'));
    }
    public function cateUpdate(Category $cate, Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
        ]);
        $cate->update($data);
        return redirect()->back()->with('updateCateSuccess', 'Cập nhập thành công tên danh mục');
    }
    public function cateDelete(Category $cate)
    {
        $cate->delete();
        return redirect()->route('admin.categories')->with('deleteCateSuccess', 'Xóa thành công danh mục');
    }

    public function cateFormAdd()
    {
        return view('asm.admin.cateAdd');
    }
    public function cateAdd(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
        ]);
        Category::create($data);
        return redirect()->route('admin.categories')->with('addCateSuccess', 'Cập nhập thành công tên danh mục');
    }

    public function productsAdmin()
    {
        $clothes = Clothes::orderBy('id', 'desc')->paginate(8);
        return view('asm.admin.prdList', compact('clothes'));
    }
    public function prdFormUpdate(Clothes $clo)
    {
        $categories = Category::all();
        return view('asm.admin.prdUpdate', compact('clo', 'categories'));
    }
    public function prdUpdate(Request $request, Clothes $clo)
    {

        $data = $request->except('image_url');
        $image_old = $clo['image_url'];
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'nullable',
            'price_old' => 'required|numeric|min:1',
            'price_new' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',

        ]);
        if ($request->hasFile('image_url')) {
            $path_image = $request->file('image_url')->store('image');
            $data['image_url'] = $path_image;
        }
        $clo->update($data);
        if (isset($image_old)) {
            if (file_exists('image/' . $image_old)) {
                unlink('image/' . $image_old);
            }
        }
        return redirect()->back()->with('updatePrd', 'Sửa sản phẩm thành công');
    }

    public function prdDelete(Clothes $clo)
    {
        $clo->delete();
        return redirect()->route('admin.productsAdmin')->with('deletePrd', 'Xóa sản phẩm thành công');
    }

    public function prdFormAdd()
    {
        $categories = Category::all();
        return view('asm.admin.prdAdd', compact('categories'));
    }

    public function prdAdd(Request $request)
    {
        $data = $request->except('image_url');
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image_url' => 'required|image',
            'price_old' => 'required|numeric|min:1',
            'price_new' => 'required|numeric|min:1',
            'quantity' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);
        $data['sold'] = 0;
        if ($request->hasFile('image_url')) {
            $path_image = $request->file('image_url')->store('image');
            $data['image_url'] = $path_image;
        }
        Clothes::create($data);
        return redirect()->route('admin.productsAdmin')->with('addPrd', 'Thêm sản phẩm thành công');
    }


    
}
