<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('pages.home',['products' => Product::paginate(5)]);
})->name('home');

Route::get('/create', [ProductController::class, 'create'])->name('create');


Route::post('/store', [ProductController::class, 'ourFileStore'])->name('store');

Route::get('/edit/{id}', [ProductController::class, 'editProd'])->name('edit');
Route::post('/update/{id}', [ProductController::class, 'updateProd'])->name('update');
Route::delete('/delete/{id}', [ProductController::class, 'deleteProd'])->name('delete');