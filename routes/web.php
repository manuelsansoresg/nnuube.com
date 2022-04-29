<?php

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

/* Route::get('/', function () {
    return view('welcome');
}); */

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile/random', [App\Http\Controllers\HomeController::class, 'randomTitle']);
Route::get('/titulo/{title_id}/edit', [App\Http\Controllers\HomeController::class, 'titleEdit']);
Route::get('/titulo/crear', [App\Http\Controllers\HomeController::class, 'titleCreate']);
Route::get('/titulos', [App\Http\Controllers\HomeController::class, 'myTitles']);
Route::get('/titulo/{slug}', [App\Http\Controllers\HomeController::class, 'titleShow']);

Route::get('/titulo/{title_id}/{rate}/rate', [App\Http\Controllers\HomeController::class, 'rateTitle']);

Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile']);
Route::get('/password/set', [App\Http\Controllers\HomeController::class, 'setPassword']);

Route::get('sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);

/**
 * area de pago
 */
Route::get('/pago-success', [App\Http\Controllers\PaymentController::class, 'success']);
Route::get('/pago-failure', [App\Http\Controllers\PaymentController::class, 'failure']);
Route::get('/pago-ending', [App\Http\Controllers\PaymentController::class, 'ending']);
