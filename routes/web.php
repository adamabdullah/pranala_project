<?php
use App\Http\Controllers\HitungController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/generate-segitiga', [HitungController::class, 'hitung']);
Route::post('/generate-ganjil', [HitungController::class, 'ganjil']);
Route::post('/generate-prima', [HitungController::class, 'prima']);

