<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ListController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TaskController;

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

// For JS Requests
Route::post('/list/create', [ListController::class, 'create']);
Route::post('/list/save', [ListController::class, 'save']);
Route::post('/list/remove', [ListController::class, 'remove']);

Route::post('/task/add', [TaskController::class, 'add']);
Route::post('/task/completed', [TaskController::class, 'completed']);
// Route::post('/task/edit', [TaskController::class, 'edit']);
Route::post('/task/remove', [TaskController::class, 'remove']);

// For Browser navigation
Route::get('/', function() {
    return redirect('/home');
});

Route::get('/{page}', [PageController::class, 'switch_page'])->name('home-page');
