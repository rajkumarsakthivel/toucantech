<?php

use App\Http\Controllers\MemberController;
use App\Http\Controllers\SchoolController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/members', [MemberController::class, 'index']);
Route::get('/members/add', [MemberController::class, 'create']);
Route::post('/members', [MemberController::class, 'store']);
Route::get('/members/schools', [MemberController::class, 'schools']);
Route::get('/members/school/{school}', [MemberController::class, 'show']);
Route::get('/members/csv', [MemberController::class, 'downloadCsv']);
Route::get('/members/charts', [MemberController::class, 'chart']);
Route::get('/schools/search', [SchoolController::class, 'searchByCountry']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
