<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\depanController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\halamanController;
use App\Http\Controllers\keterampilanController;
use Illuminate\Routing\Route as RoutingRoute;
use App\Http\Controllers\pendidikanController;
use App\Http\Controllers\pengalamanController;
use App\Http\Controllers\pengaturanHalamanController;
use App\Http\Controllers\profilController;
use App\Http\Controllers\projectsController;

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

Route::get('/', [depanController::class, "index"]);

Route::redirect('home', 'dashboard');

Route::get('/auth', [authController::class, "index"])->name('login')->middleware('guest');
Route::get('/auth/redirect', [authController::class, "redirect"])->middleware('guest');
Route::get('/auth/callback', [authController::class, "callback"])->middleware('guest');
Route::get('/auth/logout', [authController::class, "logout"]);

Route::prefix('dashboard')->middleware('auth')->group(
    function () {
        Route::get('/', [halamanController::class, 'index']);
        Route::resource('halaman', halamanController::class);
        Route::resource('pengalaman', pengalamanController::class);
        Route::resource('pendidikan', pendidikanController::class);
        Route::get('keterampilan', [keterampilanController::class, 'index'])->name('keterampilan.index');
        Route::post('keterampilan', [keterampilanController::class, 'update'])->name('keterampilan.update');
        Route::get('profil', [profilController::class, 'index'])->name('profil.index');
        Route::post('profil', [profilController::class, 'update'])->name('profil.update');
        Route::resource('projects', projectsController::class);
        Route::get('pengaturanhalaman', [pengaturanHalamanController::class, 'index'])->name('pengaturanhalaman.index');
        Route::post('pengaturanhalaman', [pengaturanHalamanController::class, 'update'])->name('pengaturanhalaman.update');
    }
);
