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
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/storages/{storage?}', [MainController::class, 'storage']);

Route::get('/search', [MainController::class, 'search'])->name('search');


Route::get('/storage/{product?}', [MainController::class, 'product']);

// Route::get('/', 'MainController@index');

// Route::get('/', function () {
//     // $test = "Тестовое задание";
//     return view('welcome');

// });

Route::get('/index', function () {
    $test = "Тестовое задание";
    return view('home', compact('test'));

});
// Route::get('/storage', function () {
//     $test = "магазин";
//     return view('about', compact('test'));

// })->name('storage');
