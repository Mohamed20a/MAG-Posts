<?php

use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('home/index');
// });

// Index Page
Route::get('/', [HomeController::class, 'index'])->name('index');

// Upload Page
Route::post('upload-post',[HomeController::class, 'uploaded']);

// View Posts
Route::get('/view-post',[HomeController::class, 'view']);

// Delete Post
Route::get('/delete-post/{id}',[HomeController::class, 'delete']);

// Update Post
Route::get('/update-post/{id}',[HomeController::class, 'update']);

// Confirm Post After Update
Route::post('/confirm-post/{id}',[HomeController::class, 'confirm']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified', 'password.confirm',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
