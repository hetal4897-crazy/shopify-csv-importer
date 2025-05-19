<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductImportController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/upload', [ProductImportController::class, 'showUploadForm'])->name("upload");
Route::post('/upload', [ProductImportController::class, 'upload'])->name('submitcsv');
Route::get('/import/{id}', [ProductImportController::class, 'show']);

Route::get("product-list", [ProductImportController::class, 'product_list'])->name("product-list");

Route::get("file-list", [ProductImportController::class, 'file_list'])->name("file-list");

$router->group(['namespace' => '\Rap2hpoutre\LaravelLogViewer'], function() use ($router) {
    $router->get('logs', 'LogViewerController@index')->name('logs');
});
