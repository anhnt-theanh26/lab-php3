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


// asm

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
Route::prefix('lab6')->group(function () {
    Route::get('/', [AdminController::class, 'formLogin'])->name('lab6.formLogin');
    Route::post('login', [AdminController::class, 'login'])->name('lab6.login');
    Route::get('formRegister', [AdminController::class, 'formRegister'])->name('lab6.formRegister');
    Route::post('register', [AdminController::class, 'register'])->name('lab6.register');
    Route::get('logout', [AdminController::class, 'logout'])->name('lab6.logout');
    Route::put('update/{user}', [AdminController::class, 'update'])->name('lab6.update');
});

Route::middleware(AdminMiddleware::class)->get('home', [AdminController::class, 'home'])->name('lab6.home');
Route::middleware(AdminMiddleware::class)->get('listUser/{user}', [AdminController::class, 'listUser'])->name('lab6.listUser');
Route::middleware(AdminMiddleware::class)->get('onAccount/{user}', [AdminController::class, 'onAccount'])->name('lab6.onAccount');
Route::middleware(AdminMiddleware::class)->get('offAccount/{user}', [AdminController::class, 'offAccount'])->name('lab6.offAccount');
