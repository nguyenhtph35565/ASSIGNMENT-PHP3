<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\SearchController;
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

Route::get('/', function () {
    return view('client.index');
});

Route::get('shop', function () {
    return view('client.shop');
})->name('shop');

Route::get('about', function () {
    return view('client.about');
})->name('about');
Route::get('/', [ClientController::class, 'index']);
Route::get('/{id}/details', [ClientController::class, 'details'])->name('client.details');
Route::get('/category/{id}', [ClientController::class, 'category'])->name('client.category');



Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index']);
    Route::get('/table', [NewController::class, 'index'])->name('admin.table');
    Route::get('/create', [NewController::class, 'create'])->name('admin.create');
    Route::post('/store', [NewController::class, 'store'])->name('admin.store');
    Route::get('/{id}/details', [NewController::class, 'details'])->name('admin.details');
    Route::get('/{id}/edit', [NewController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}', [NewController::class, 'update'])->name('admin.update');
    Route::get('/{id}/delete', [NewController::class, 'destroy'])->name('admin.delete');
});
