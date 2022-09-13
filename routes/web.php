<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HalamanUtamaController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;

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
// Route::resource('posts', PostController::class);

// Route::get('/', function () {zzzzzzzzzzzzzzzzz
//     return view('welcome');
// });
Auth::routes();

Route::get('/', [HalamanUtamaController::class, 'index']);
Route::get('/dashboard', [HalamanUtamaController::class, 'dashboard'])->middleware('auth');
Route::get('logout', [AuthController::class, 'logout']);

// halaman Kategori
Route::get('kategori/{slug_kategori}', [HalamanUtamaController::class, 'index_kategori']);
Route::get('kategori/{slug_kategori}/{slug_detail}', [HalamanUtamaController::class, 'index_postingan']);

// halaman dashboard katagori
Route::get('dashboard/kategori', [KategoriController::class, 'index']);
Route::get('dashboard/kategori/create', [KategoriController::class, 'create']);
Route::post('dashboard/kategori', [KategoriController::class, 'store']);
// Route::get('dashboard/kategori/{id}', [KategoriController::class, 'show']);
Route::get('dashboard/kategori/{id}/edit', [KategoriController::class, 'edit']);
Route::put('dashboard/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('dashboard/kategori/{id}', [KategoriController::class, 'destroy']);

// halaman dashboard post
Route::get('dashboard/postingan', [PostController::class, 'index']);
Route::get('dashboard/postingan/create', [PostController::class, 'create']);
Route::post('dashboard/postingan', [PostController::class, 'store']);
// Route::get('dashboard/postingan/{id}', [PostController::class, 'show']);
Route::get('dashboard/postingan/{id}/edit', [PostController::class, 'edit']);
Route::put('dashboard/postingan/{id}', [PostController::class, 'update']);
Route::delete('dashboard/postingan/{id}', [PostController::class, 'destroy']);

// Route::resource('layanan', KategoriController::class)->middleware('auth');
// Route::resource('details-layanan', PostController::class)->middleware('auth');
// Route::resource('objek-wisata', ObjekWisataController::class);

