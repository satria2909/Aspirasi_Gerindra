<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false]);

Route::group(['middleware' => ['is_admin','auth'], 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // SKOR SPK SMART
    Route::get('spk', [App\Http\Controllers\Admin\SpkController::class, 'index'])->name('spk.index');
    Route::patch('/aspirasi/{id}/status', [App\Http\Controllers\Admin\SpkController::class, 'updateStatus'])->name('spk.updateStatus');
    // aspirasi
    Route::resource('aspirasis', \App\Http\Controllers\Admin\AspirasiController::class)->only(['index', 'destroy']);
    //galeri
    Route::resource('galeris', \App\Http\Controllers\Admin\GaleriController::class)->only('index', 'create','store', 'edit', 'destroy');
    // anggota
    Route::resource('anggotas', \App\Http\Controllers\Admin\AnggotaController::class)->except('show');
    Route::resource('anggotas.galleries', \App\Http\Controllers\Admin\GalleryController::class)->except(['create', 'index','show']);
    // categories
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class)->except('show');
    // blogs
    Route::resource('blogs', \App\Http\Controllers\Admin\BlogController::class)->except('show');
    // profile
    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('homepage');
// anggota
Route::get('anggotas',[\App\Http\Controllers\AnggotaController::class, 'index'])->name('anggota.index');
Route::get('anggotas/{anggota:slug}',[\App\Http\Controllers\AnggotaController::class, 'show'])->name('anggota.show');
// blogs
Route::get('blogs', [\App\Http\Controllers\BlogController::class, 'index'])->name('blog.index');
Route::get('blogs/{blog:slug}', [\App\Http\Controllers\BlogController::class, 'show'])->name('blog.show');
Route::get('blogs/category/{category:slug}', [\App\Http\Controllers\BlogController::class, 'category'])->name('blog.category');
// aspirasi
Route::get('aspirasi', function() {
    return view('aspirasi');
})->name('aspirasi');
// aspirasi
Route::post('aspirasi', [App\Http\Controllers\AspirasiController::class, 'store'])->name('aspirasi.store');


//galeri
Route::get('galeri', function() {
    return view('galeri');
})->name('galeri');

Route::get('galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri');





