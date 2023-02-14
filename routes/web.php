<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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

Auth::routes();

/////

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/users', [DashboardController::class, 'users'])->name('users');
// Route::get('/user/{id}', [DashboardController::class, 'users'])->name('user.show');

Route::get('/roles', [DashboardController::class, 'roles'])->name('roles');
Route::get('/roles/items', [DashboardController::class, 'roles'])->name('roles.items');

Route::get('/permissions', [DashboardController::class, 'permissions'])->name('permissions');
Route::get('/permissions/items', [DashboardController::class, 'permissions'])->name('permissions.items');

/////
Route::get('/', function () {
    return view('welcome');
});