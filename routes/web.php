<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

//Before login
Route::get('/', [HomeController::class, 'index']);

//After login
Route::get('redirects', [HomeController::class, 'redirects']);

Route::get('/users', [AdminController::class, 'user']);

Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);

Route::get('/foodmenu', [AdminController::class, 'foodmenu']);

Route::post('/uploadfood', [AdminController::class, 'upload']);

Route::get('/deletemenu/{id}', [AdminController::class, 'deletemenu']);

Route::get('/updateview/{id}', [AdminController::class, 'updateview']);

Route::post('/update/{id}', [AdminController::class, 'update']);

Route::post('/reservation', [AdminController::class, 'reservation']);

Route::get('/viewreservation', [AdminController::class, 'viewreservation']);

Route::get('/addchef', [AdminController::class, 'addchef']);

Route::post('/uploadchef', [AdminController::class, 'uploadchef']);

Route::get('/viewchef', [AdminController::class, 'viewchef']);

Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);

Route::get('/updatechefview/{id}', [AdminController::class, 'updatechefview']);

Route::post('/updatechef/{id}', [AdminController::class, 'updatechef']);

Route::post('/addcart/{id}', [HomeController::class, 'addcart']);

Route::get('/showcart/{id}', [HomeController::class, 'showcart']);

Route::get('/remove/{id}', [HomeController::class, 'remove']);

Route::post('/insertorder', [HomeController::class, 'insertorder']);

Route::get('/orders', [AdminController::class, 'orders']);

Route::get('/search', [AdminController::class, 'search']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
