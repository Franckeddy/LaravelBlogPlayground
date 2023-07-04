<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
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

Route::get('/', [MainController::class, 'index'])->name('index');

Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('/login', [AuthController::class, 'loginPost']);
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

Route::prefix('/blog')->name('blog.')->controller(BlogController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/new','create')->name('create');
    Route::post('/new','store')->name('store');
    Route::get('/{post}/edit','edit')->name('edit');
    Route::patch('/{post}/edit','update')->name('update');
    Route::get('/{slug}-{post}','show')->where([
        'slug' => '[a-z0-9\-]+',
        'post' => '[0-9]+',
    ])->name('show');
});

Route::prefix('/cat')->name('cat.')->controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/','index')->name('index');
    Route::get('/new','create')->name('create');
    Route::post('/new','store')->name('store');
    Route::get('/{category}/edit','edit')->name('edit');
    Route::patch('/{category}/edit','update')->name('update');
    Route::get('/{category}','show')->name('show');
});

