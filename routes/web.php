<?php

use App\Http\Controllers\Asm\ClothesController;
use App\Http\Controllers\asm\ProductController;
use App\Http\Controllers\BooksController;
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
Route::get('/', [ProductController::class, 'index'])->name('/');
Route::get('detail/{id}', [ProductController::class, 'detail'])->name('detail');
Route::get('allPrd', [ProductController::class, 'allPrd'])->name('allPrd');
Route::get('prdCate/{id}', [ProductController::class, 'prdCate'])->name('prdCate');
Route::get('search', [ProductController::class, 'search'])->name('searchPrd');
Route::post('/update-price', [ProductController::class, 'updatePrice'])->name('update.price');
