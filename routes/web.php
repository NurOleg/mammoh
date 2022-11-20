<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

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

Route::get('/', HomeController::class)->name('home');

Route::controller(CatalogController::class)->group(function () {
    Route::get('/catalog/{slug}', 'index')->name('catalog.serie');
    Route::get('/catalog/configurator/{reducer_id}', 'configurator')->name('catalog.configurator');
    Route::get('/catalog/{slug}/{reducer_id}', 'show')->name('catalog.detail');
});
