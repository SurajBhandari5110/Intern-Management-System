<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TlInternAssignmentController;
use App\Http\Controllers\InternController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::view('/', 'index');
Route::get('/login', [AuthController::class, 'index']);
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/contact', function () {
    return view('contact');
});


// Admin Routes (Handled by Voyager)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return redirect()->route('voyager.dashboard');
    })->name('voyager.dashboard');
});

// Team Leader Routes
Route::middleware(['auth', 'role:team_leader'])->group(function () {
    Route::get('/tl/dashboard', [TlInternAssignmentController::class, 'index'])->name('tl.dashboard');
    Route::get('/tl/interns/create', [TlInternAssignmentController::class, 'create'])->name('tl.interns.create');
    Route::post('/tl/interns', [TlInternAssignmentController::class, 'store'])->name('tl.interns.store');
});

// Intern Routes
Route::middleware(['auth', 'role:intern'])->group(function () {
    Route::get('/intern/dashboard', [InternController::class, 'dashboard'])->name('intern.dashboard');
});

//log out
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

