<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;

Route::get('/', function () {
    $products = Product::orderBy('price')->get();
    return view('/products/list', ['products'=>$products]);
});

Route::get('/create', function () {
    return view('/products/create');
});

Route::get('product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/create',[ProductController::class,'create'])->name('product.create');
Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/product/{product}/edit',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/{product}/update',[ProductController::class,'update'])->name('product.update');
Route::delete('/product/{product}/destroy',[ProductController::class,'destroy'])->name('product.destroy');


