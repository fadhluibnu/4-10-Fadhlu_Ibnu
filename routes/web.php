<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('index', [
        'title' => 'Home'
    ]);
});

Route::get('/about', function () {
    return view('about', [
        'title' => 'About',
        'nama' => "Fadhlu Ibnu 'Abbad",
        'email' => 'f.ibnu.a1@gmail.com',
        'gambar' => 'fadhluabbadght.png'
    ]);
});
Route::get('/gallery', function () {
    return view('gallery', [
        'title' => 'Gallery'
    ]);
});

Route::resource('/contacts', ContactController::class);

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
