<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\UserController;
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
    return view('welcome');
});

//Praktikum 4 JS 3
Route::get('/level', [LevelController::class, 'index']);

//Praktikum 5 JS 3
// Route::get('/kategori', [KategoriController::class, 'index']);

//Praktikum 6 JS 3
Route::get('/user', [UserController::class, 'index']);

//Praktikum 2.6 JS 4
Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.tambah_simpan');
Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
Route::get('/user', [UserController::class, 'index'])->name('user.index'); //Kembali
Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.ubah_simpan');
Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');

//Praktikum 3 JS 5
//Kategori
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

//Create Kategori
Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
Route::post('/kategori', [KategoriController::class, 'store']);

//Edit Kategori
Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
Route::put('/kategori/{id}', [KategoriController::class, 'edit_simpan'])->name('/kategori/edit_simpan');

//Delete Kategori
Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('/kategori/delete');

//Manage User
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');
Route::post('/user', [UserController::class, 'store']);
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('/user/edit');
Route::put('/user/{id}', [UserController::class, 'edit_simpan'])->name('/user/edit_simpan');
Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('/user/delete');

//Manage Level
Route::get('/level', [LevelController::class, 'index'])->name('level.index');
Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
Route::post('/level', [LevelController::class, 'store']);
Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('/level/edit');
Route::put('/level/{id}', [LevelController::class, 'edit_simpan'])->name('/level/edit_simpan');
Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('/level/delete');

//POS
Route::resource('m_user', POSController::class);