<?php

declare(strict_types=1);

use App\Http\Controllers\ArticlesController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CatalogController;

Route::get('/', HomeController::class)->name('home');

Route::controller(CatalogController::class)->group(function () {
    Route::get('/catalog/{slug}', 'index')->name('catalog.serie');
    Route::get('/catalog/configurator/{reducer_id}', 'configurator')->name('catalog.configurator');
    Route::get('/catalog/{slug}/{reducer_id}', 'show')->name('catalog.detail');
});

Route::controller(ArticlesController::class)->group(function () {
    Route::get('/articles', 'index')->name('articles.index');
    Route::get('/articles/{slug}', 'show')->name('articles.detail');
});

Route::get('contacts', function () {
   return view('static.contacts');
})->name('contacts');

Route::get('about', function () {
    return view('static.about');
})->name('about');
