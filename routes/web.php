<?php

use App\Http\Controllers\DataController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;

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

Route::get('/dashboard', function () {
    return view('web.dash');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::get('/level-user', [LevelController::class, 'index']);
Route::get('/level-user-add', [LevelController::class, 'create']);
Route::post('/level-user', [LevelController::class, 'store']);
Route::get('/level-user-edit/{id}', [LevelController::class, 'edit']);
Route::put('/level-user/{id}', [LevelController::class, 'update']);
Route::get('/level-user-delete/{id}', [LevelController::class, 'delete']);
Route::delete('/level-user-destroy/{id}', [LevelController::class, 'destroy']);

Route::get('/user', [DataController::class, 'index']);
Route::get('/user-add', [DataController::class, 'create']);
Route::post('/user', [DataController::class, 'store']);
Route::get('/user-edit/{id}', [DataController::class, 'edit']);
Route::put('/user/{id}', [DataController::class, 'update']);
Route::get('/user-delete/{id}', [DataController::class, 'delete']);
Route::delete('/user-destroy/{id}', [DataController::class, 'destroy']);


require __DIR__.'/auth.php';
