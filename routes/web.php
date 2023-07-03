<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataMigrantController;
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



Route::controller(DataMigrantController::class)->group(function(){
    Route::get('/', 'accueil')->name('accueil');
    Route::get('/regions', 'index')->name('regions');
    Route::get('/reporting', 'information')->name('reporting');
});
