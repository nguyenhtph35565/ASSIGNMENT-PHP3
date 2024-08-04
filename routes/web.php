<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewController;
use App\Http\Controllers\SearchController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Auth;
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

// Client
Route::get('/',              [ClientController::class, 'index'])->name('home');
Route::get('/shop',          [ClientController::class, 'shop'])->name('shop');
Route::get('/about',         [ClientController::class, 'about'])->name('about');
Route::get('/news/{id}',     [ClientController::class, 'details'])->name('client.details');
Route::get('/category/{id}', [ClientController::class, 'category'])->name('client.category');
Route::get('/search',        [ClientController::class, 'search'])->name('search');

// Admin
Route::prefix('admin')->group(function () {
    Route::get('/',             [AdminController::class, 'index']);
    Route::get('/table',        [NewController::class, 'index'])->name('admin.table');
    Route::get('/create',       [NewController::class, 'create'])->name('admin.create');
    Route::post('/store',       [NewController::class, 'store'])->name('admin.store');
    Route::get('/{id}/details', [NewController::class, 'details'])->name('admin.details');
    Route::get('/{id}/edit',    [NewController::class, 'edit'])->name('admin.edit');
    Route::put('/{id}',         [NewController::class, 'update'])->name('admin.update');
    Route::get('/{id}/delete',  [NewController::class, 'destroy'])->name('admin.delete');

    // Category routes
    Route::get('/createCate',           [AdminController::class, 'createCate'])->name('admin.createCate');
    Route::get('/categories',           [CategoryController::class, 'index'])->name('admin.categories.table');
    Route::get('/categories/create',    [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories/store',    [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}',      [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}',   [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});





//

Route::get('login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('login', [LoginController::class, 'login']);

Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [HomeController::class, 'dashboard'])->name('dashboard')->middleware(CheckAdmin::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
