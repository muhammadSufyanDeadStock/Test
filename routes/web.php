<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\Products;


Route::get('/', [Products::class, 'index'])->name('products');
Route::get('/product/add', [Products::class, 'add'])->name('products.add');
Route::post('/product/add', [Products::class, 'store'])->name('products.store');
Route::get('/product/edit/{id}', [Products::class, 'edit'])->name('products.edit');
Route::post('/product/edit/', [Products::class, 'update'])->name('products.update');
Route::get('/product/delete/{id}', [Products::class, 'delete'])->name('products.delete');
Route::get('/product/Export', [Products::class, 'exportDirect'])->name('products.export.direct');
Route::get('/product/Export/Queue', [Products::class, 'export'])->name('products.export');
