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

Route::get('', [App\Http\Controllers\PageController::class, 'home'] );
Route::get('home', [App\Http\Controllers\PageController::class, 'home'] );
Route::get('wallet', [App\Http\Controllers\AssetController::class, 'wallet'])->name('wallet');

Route::delete('wallet/{asset}', [App\Http\Controllers\AssetController::class, 'destroy']);
Route::post('wallet', [App\Http\Controllers\AssetController::class, 'store']);

Auth::routes();
