<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\POSController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
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

//Jobsheet 7
Route::get('/', [WelcomeController::class, 'index']);

Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index']);          // Menampilkan halaman awal user
    Route::post('/list', [UserController::class, 'list']);      // Menampilkan data user dalam bentuk json untuk datatables
    Route::get('/create', [UserController::class, 'create']);   // Menampilkan halaman form tambah user
    Route::post('/', [UserController::class, 'store']);         // Menyimpan data user baru
    Route::get('/{id}', [UserController::class, 'show']);       // Menampilkan detail user
    Route::get('/{id}/edit', [UserController::class, 'edit']);  // Menampilkan halaman form edit user
    Route::put('/{id}', [UserController::class, 'update']);     // Menyimpan perubahan data user
    Route::delete('/{id}', [UserController::class, 'destroy']); // Menghapus data user
});

Route::group(['prefix' => 'level'], function () {
    Route::get('/', [LevelController::class, 'index']);          // Menampilkan halaman awal level
    Route::post('/list', [LevelController::class, 'list']);      // Menampilkan data level dalam bentuk json untuk datatables
    Route::get('/create', [LevelController::class, 'create']);   // Menampilkan halaman form tambah level
    Route::post('/', [LevelController::class, 'store']);         // Menyimpan data level baru
    Route::get('/{id}', [LevelController::class, 'show']);       // Menampilkan detail level
    Route::get('/{id}/edit', [LevelController::class, 'edit']);  // Menampilkan halaman form edit level
    Route::put('/{id}', [LevelController::class, 'update']);     // Menyimpan perubahan data level
    Route::delete('/{id}', [LevelController::class, 'destroy']); // Menghapus data level
});

Route::group(['prefix' => 'kategori'], function () {
    Route::get('/', [KategoriController::class, 'index']);          // Menampilkan halaman awal kategori
    Route::post('/list', [KategoriController::class, 'list']);      // Menampilkan data kategori dalam bentuk json untuk datatables
    Route::get('/create', [KategoriController::class, 'create']);   // Menampilkan halaman form tambah kategori
    Route::post('/', [KategoriController::class, 'store']);         // Menyimpan data kategori baru
    Route::get('/{id}', [KategoriController::class, 'show']);       // Menampilkan detail kategori
    Route::get('/{id}/edit', [KategoriController::class, 'edit']);  // Menampilkan halaman form edit kategori
    Route::put('/{id}', [KategoriController::class, 'update']);     // Menyimpan perubahan data kategori
    Route::delete('/{id}', [KategoriController::class, 'destroy']); // Menghapus data kategori
});

Route::group(['prefix' => 'barang'], function () {
    Route::get('/', [BarangController::class, 'index']);          // Menampilkan halaman awal barang
    Route::post('/list', [BarangController::class, 'list']);      // Menampilkan data barang dalam bentuk json untuk datatables
    Route::get('/create', [BarangController::class, 'create']);   // Menampilkan halaman form tambah barang
    Route::post('/', [BarangController::class, 'store']);         // Menyimpan data barang baru
    Route::get('/{id}', [BarangController::class, 'show']);       // Menampilkan detail barang
    Route::get('/{id}/edit', [BarangController::class, 'edit']);  // Menampilkan halaman form edit barang
    Route::put('/{id}', [BarangController::class, 'update']);     // Menyimpan perubahan data barang
    Route::delete('/{id}', [BarangController::class, 'destroy']); // Menghapus data barang
});

Route::group(['prefix' => 'stok'], function () {
    Route::get('/', [StokController::class, 'index']);          // Menampilkan halaman awal stok
    Route::post('/list', [StokController::class, 'list']);      // Menampilkan data stok dalam bentuk json untuk datatables
    Route::get('/create', [StokController::class, 'create']);   // Menampilkan halaman form tambah stok
    Route::post('/', [StokController::class, 'store']);         // Menyimpan data stok baru
    Route::get('/{id}', [StokController::class, 'show']);       // Menampilkan detail stok
    Route::get('/{id}/edit', [StokController::class, 'edit']);  // Menampilkan halaman form edit stok
    Route::put('/{id}', [StokController::class, 'update']);     // Menyimpan perubahan data stok
    Route::delete('/{id}', [StokController::class, 'destroy']); // Menghapus data stok
});

Route::group(['prefix' => 'transaksi'], function () {
    Route::get('/', [TransaksiController::class, 'index']);          // Menampilkan halaman awal transaksi
    Route::post('/list', [TransaksiController::class, 'list']);      // Menampilkan data transaksi dalam bentuk json untuk datatables
    Route::get('/create', [TransaksiController::class, 'create']);   // Menampilkan halaman form tambah transaksi
    Route::post('/', [TransaksiController::class, 'store']);         // Menyimpan data transaksi baru
    Route::get('/{id}', [TransaksiController::class, 'show']);       // Menampilkan detail transaksi
    Route::get('/{id}/edit', [TransaksiController::class, 'edit']);  // Menampilkan halaman form edit transaksi
    Route::put('/{id}', [TransaksiController::class, 'update']);     // Menyimpan perubahan data transaksi
    Route::delete('/{id}', [TransaksiController::class, 'destroy']); // Menghapus data transaksi
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::post('proses_register', [AuthController::class, 'proses_register'])->name('proses_register');

// Kita atur juga untuk middleware menggunakan group pada routing
// didalamnya terdapat group untuk mengecek kondisi login
// jika user yang login merupakan admin maka akan diarahkan ke AdminController
// jika user yang login merupakan manager maka akan diarahkan ke UserController
Route::group(['middleware' => ['auth']], function () {

    Route::group(['middleware' => ['cek_login:1']], function () {
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['cek_login:2']], function () {
        Route::resource('manager', ManagerController:: class);
    });
});

// Route::get('/', function () {
//     return view('welcome');
// });

// //Praktikum 4 JS 3
// Route::get('/level', [LevelController::class, 'index']);

// //Praktikum 5 JS 3
// // Route::get('/kategori', [KategoriController::class, 'index']);

// //Praktikum 6 JS 3
// Route::get('/user', [UserController::class, 'index']);

// //Praktikum 2.6 JS 4
// Route::get('/user/tambah', [UserController::class, 'tambah'])->name('user.tambah');
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan'])->name('user.tambah_simpan');
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah'])->name('user.ubah');
// Route::get('/user', [UserController::class, 'index'])->name('user.index'); //Kembali
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan'])->name('user.ubah_simpan');
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus'])->name('user.hapus');

// //Praktikum 3 JS 5
// //Kategori
// Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');

// //Create Kategori
// Route::get('/kategori/create', [KategoriController::class, 'create'])->name('/kategori/create');
// Route::post('/kategori', [KategoriController::class, 'store']);

// //Edit Kategori
// Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('/kategori/edit');
// Route::put('/kategori/{id}', [KategoriController::class, 'edit_simpan'])->name('/kategori/edit_simpan');

// //Delete Kategori
// Route::get('/kategori/delete/{id}', [KategoriController::class, 'delete'])->name('/kategori/delete');

// //Manage User
// Route::get('/user', [UserController::class, 'index'])->name('user.index');
// Route::get('/user/create', [UserController::class, 'create'])->name('/user/create');
// Route::post('/user', [UserController::class, 'store']);
// Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('/user/edit');
// Route::put('/user/{id}', [UserController::class, 'edit_simpan'])->name('/user/edit_simpan');
// Route::get('/user/delete/{id}', [UserController::class, 'delete'])->name('/user/delete');

// //Manage Level
// Route::get('/level', [LevelController::class, 'index'])->name('level.index');
// Route::get('/level/create', [LevelController::class, 'create'])->name('/level/create');
// Route::post('/level', [LevelController::class, 'store']);
// Route::get('/level/edit/{id}', [LevelController::class, 'edit'])->name('/level/edit');
// Route::put('/level/{id}', [LevelController::class, 'edit_simpan'])->name('/level/edit_simpan');
// Route::get('/level/delete/{id}', [LevelController::class, 'delete'])->name('/level/delete');

// //POS
// Route::resource('m_user', POSController::class);