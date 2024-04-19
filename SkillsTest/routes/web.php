<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyListingController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/listings', [PropertyListingController::class, 'listings']);
Route::get('/import-listings', [PropertyListingController::class, 'importListings']);
Route::get('/index', [PropertyListingController::class, 'index']);
