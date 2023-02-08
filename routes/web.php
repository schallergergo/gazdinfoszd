<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HorseController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get("/horses/index",[HorseController::class,'index'])->name('horses.index');
Route::get('/horse/create',[HorseController::class,'create'])->name('horse.create');
Route::post("/horse/store",[HorseController::class,'store'])->name('horse.store');
Route::get("/horse/edit/{horse}",[HorseController::class,'edit'])->name('horse.edit');
Route::patch("/horse/update/{horse}",[HorseController::class,'update'])->name('horse.update');;


Route::get('/test', function () {
    return redirect()->back();
})->name("test");