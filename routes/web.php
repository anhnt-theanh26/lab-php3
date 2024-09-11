<?php

use App\Http\Controllers\Asm\ClothesController;
use App\Http\Controllers\asm\ProductController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\lab5\MovieController;
use App\Http\Controllers\lab6\AdminController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', [BooksController::class, 'index'])->name('/');



// Route::get('/formAdd', [BooksController::class, 'formAdd'])->name('formAdd');
// Route::get('/formUpdate/{id}', [BooksController::class, 'formUpdate'])->name('formUpdate');
// Route::get('/delete/{id}', [BooksController::class, 'delete'])->name('delete');

// Route::post('/add', [BooksController::class, 'add'])->name('add');
// Route::put('/update/{id}', [BooksController::class, 'update'])->name('update');


// chọn admin or client
Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('index');
    });
    Route::get('client', [ClothesController::class, 'index'])->name('/');
    Route::get('admin', [AdminController::class, 'formLogin'])->name('admin.formLogin');
});


// asm old
Route::prefix('client')->group(function () {
    Route::get('/', [ClothesController::class, 'index'])->name('/');
    Route::get('/detail/{id}', [ClothesController::class, 'detail'])->name('detail');
    Route::get('/products', [ClothesController::class, 'products'])->name('products');
    Route::get('/products-cate/{id}', [ClothesController::class, 'products_cate'])->name('products-cate');
    Route::get('/search', [ClothesController::class, 'search'])->name('search');
});

// asm 2
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'formLogin'])->name('admin.formLogin');
    Route::post('login', [AdminController::class, 'login'])->name('admin.login');
    Route::get('formRegister', [AdminController::class, 'formRegister'])->name('admin.formRegister');
    Route::post('register', [AdminController::class, 'register'])->name('admin.register');
    Route::get('logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::middleware('adminMiddleware')->group(function () {
    // admin
    Route::get('account', [AdminController::class, 'account'])->name('admin.account');
    Route::get('listUser/{user}', [AdminController::class, 'listUser'])->name('admin.listUser');
    Route::get('onAccount/{user}', [AdminController::class, 'onAccount'])->name('admin.onAccount');
    Route::get('offAccount/{user}', [AdminController::class, 'offAccount'])->name('admin.offAccount');
    Route::put('update/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('formUpdatePassword/{user}', [AdminController::class, 'formUpdatePassword'])->name('admin.formUpdatePassword');
    Route::put('updatePassword', [AdminController::class, 'updatePassword'])->name('admin.updatePassword');
    Route::delete('deleteUser/{user}', [AdminController::class, 'deleteUser'])->name('admin.deleteUser');

    // danh mục
    Route::get('categories', [ClothesController::class, 'categories'])->name('admin.categories');
    Route::get('cateFormUpdate/{cate}', [ClothesController::class, 'cateFormUpdate'])->name('admin.cateFormUpdate');
    Route::put('cateUpdate/{cate}', [ClothesController::class, 'cateUpdate'])->name('admin.cateUpdate');
    Route::get('cateFormAdd', [ClothesController::class, 'cateFormAdd'])->name('admin.cateFormAdd');
    Route::post('cateAdd', [ClothesController::class, 'cateAdd'])->name('admin.cateAdd');
    Route::delete('cateDelete/{cate}', [ClothesController::class, 'cateDelete'])->name('admin.cateDelete');

    // sản phẩm
    Route::get('products', [ClothesController::class, 'productsAdmin'])->name('admin.productsAdmin');
    Route::get('prdFormUpdate/{clo}', [ClothesController::class, 'prdFormUpdate'])->name('admin.prdFormUpdate');
    Route::put('prdUpdate/{clo}', [ClothesController::class, 'prdUpdate'])->name('admin.prdUpdate');
    Route::get('prdFormAdd', [ClothesController::class, 'prdFormAdd'])->name('admin.prdFormAdd');
    Route::post('prdAdd', [ClothesController::class, 'prdAdd'])->name('admin.prdAdd');
    Route::delete('prdDelete/{clo}', [ClothesController::class, 'prdDelete'])->name('admin.prdDelete');

    // thống kê
    Route::get('thongke', [AdminController::class, 'thongke'])->name('admin.thongke');

});



// Route::middleware(AdminMiddleware::class)->get('home', [AdminController::class, 'home'])->name('admin.home');
// Route::middleware(AdminMiddleware::class)->get('listUser/{user}', [AdminController::class, 'listUser'])->name('admin.listUser');
// Route::middleware(AdminMiddleware::class)->get('onAccount/{user}', [AdminController::class, 'onAccount'])->name('admin.onAccount');
// Route::middleware(AdminMiddleware::class)->get('offAccount/{user}', [AdminController::class, 'offAccount'])->name('admin.offAccount');


// asm new
// Route::prefix('/')->group(function () {
//     Route::get('/', [ProductController::class, 'index'])->name('/');
//     Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
//     Route::get('allPrd', [ProductController::class, 'allPrd'])->name('allPrd');
//     Route::get('prdCate/{id}', [ProductController::class, 'prdCate'])->name('prdCate');
//     Route::get('search', [ProductController::class, 'search'])->name('searchPrd');
//     Route::post('/update-price', [ProductController::class, 'updatePrice'])->name('update.price');
// });

// Route::prefix('admin')->group(function () {

//     // danh mục
//     Route::get('/', [ProductController::class, 'listCate'])->name('admin');
//     Route::get('formAddCate', [ProductController::class, 'formAddCate'])->name('admin.formAddCate');
//     Route::post('addCate', [ProductController::class, 'addCate'])->name('admin.addCate');
//     Route::get('formUpdateCate/{cate}', [ProductController::class, 'formUpdateCate'])->name('admin.formUpdateCate');
//     Route::put('updateCate/{cate}', [ProductController::class, 'updateCate'])->name('admin.updateCate');
//     Route::delete('deleteCate/{cate}', [ProductController::class, 'deleteCate'])->name('admin.deleteCate');
//     // sản phẩm
//     Route::get('products', [ProductController::class, 'products'])->name('admin.products');
//     Route::get('formAddPrd', [ProductController::class, 'formAddPrd'])->name('admin.formAddPrd');
//     Route::get('formAddUpdate/{product}', [ProductController::class, 'formAddUpdate'])->name('admin.formAddUpdate');
//     Route::put('updatePrd/{product}', [ProductController::class, 'updatePrd'])->name('admin.updatePrd');


// });

// lab5
// Route::prefix('lab5')->group(function () {
//     Route::get('/', [MovieController::class, 'index'])->name('/');
//     Route::get('formAdd', [MovieController::class, 'formAdd'])->name('lab5.formAdd');
//     Route::post('add', [MovieController::class, 'add'])->name('lab5.add');
//     Route::delete('delete/{movie}', [MovieController::class, 'delete'])->name('lab5.delete');
//     Route::get('formUpdate/{movie}', [MovieController::class, 'formUpdate'])->name('lab5.formUpdate');
//     Route::put('update/{movie}', [MovieController::class, 'update'])->name('lab5.update');
//     Route::get('detail/{movie}', [MovieController::class, 'detail'])->name('lab5.detail');
//     Route::get('search', [MovieController::class, 'search'])->name('lab5.search');
// });


// lab 6
// Route::prefix('lab6')->group(function () {
//     Route::get('/', [AdminController::class, 'formLogin'])->name('lab6.formLogin');
//     Route::post('login', [AdminController::class, 'login'])->name('lab6.login');
//     Route::get('formRegister', [AdminController::class, 'formRegister'])->name('lab6.formRegister');
//     Route::post('register', [AdminController::class, 'register'])->name('lab6.register');
//     Route::get('logout', [AdminController::class, 'logout'])->name('lab6.logout');
//     Route::put('update/{user}', [AdminController::class, 'update'])->name('lab6.update');
// });

// Route::middleware(AdminMiddleware::class)->get('home', [AdminController::class, 'home'])->name('lab6.home');
// Route::middleware(AdminMiddleware::class)->get('listUser/{user}', [AdminController::class, 'listUser'])->name('lab6.listUser');
// Route::middleware(AdminMiddleware::class)->get('onAccount/{user}', [AdminController::class, 'onAccount'])->name('lab6.onAccount');
// Route::middleware(AdminMiddleware::class)->get('offAccount/{user}', [AdminController::class, 'offAccount'])->name('lab6.offAccount');
