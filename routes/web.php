<?php

use App\Http\Controllers\Asm\ClothesController;
use App\Http\Controllers\asm\ProductController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\lab5\MovieController;
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
// Route::get('home',)->name('home');
// Route::get('/', [ProductController::class, 'index'])->name('/');
// Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
// Route::get('allPrd', [ProductController::class, 'allPrd'])->name('allPrd');
// Route::get('prdCate/{id}', [ProductController::class, 'prdCate'])->name('prdCate');
// Route::get('search', [ProductController::class, 'search'])->name('searchPrd');
// Route::post('/update-price', [ProductController::class, 'updatePrice'])->name('update.price');




// lab5
Route::get('/', [MovieController::class, 'index'])->name('/');
Route::prefix('lab5')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('/');
    Route::get('formAdd', [MovieController::class, 'formAdd'])->name('lab5.formAdd');
    Route::post('add', [MovieController::class, 'add'])->name('lab5.add');
    Route::delete('delete/{movie}', [MovieController::class, 'delete'])->name('lab5.delete');
    Route::get('formUpdate/{movie}', [MovieController::class, 'formUpdate'])->name('lab5.formUpdate');
    Route::put('update/{movie}', [MovieController::class, 'update'])->name('lab5.update');
    Route::get('detail/{movie}', [MovieController::class, 'detail'])->name('lab5.detail');
    Route::get('search', [MovieController::class, 'search'])->name('lab5.search');
});
