<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClubController;
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

Route::get('/', [ClubController::class, 'index']);
Route::resource('club', ClubController::class);
Route::get('hasil_pertandingan',[ClubController::class, 'result'])->name('club.result');
Route::post('hasil_pertandingan',[ClubController::class, 'saveResult'])->name('club.saveResult');