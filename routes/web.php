<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PenerbitController;
use Illuminate\Support\Facades\Route;
use App\Models\Buku;
use App\Models\Penerbit;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [BukuController::class, 'index'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/dashboard', [BukuController::class, 'index'])->name('dashboard');

    Route::get('/adminbuku', [BukuController::class, 'indexadmin'])->name('admin.buku');

    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/destroy/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
    Route::get('/buku/show/{id}', [BukuController::class, 'show'])->name('buku.show');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update');

    Route::get('/adminpenerbit', [PenerbitController::class, 'index'])->name('admin.penerbit');

    Route::get('/penerbit/create', [PenerbitController::class, 'create'])->name('penerbit.create');
    Route::post('/penerbit/store', [PenerbitController::class, 'store'])->name('penerbit.store');
    Route::get('/penerbit/destroy/{id}', [PenerbitController::class, 'destroy'])->name('penerbit.destroy');
    Route::get('/penerbit/show/{id}', [PenerbitController::class, 'show'])->name('penerbit.show');
    Route::get('/penerbit/edit/{id}', [PenerbitController::class, 'edit'])->name('penerbit.edit');
    Route::put('/penerbit/update/{id}', [PenerbitController::class, 'update'])->name('penerbit.update');

    Route::get('/pengadaan', [PenerbitController::class, 'indexadmin'])->name('pengadaan');


});

require __DIR__.'/auth.php';
