<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavotitsController;
use App\Http\Controllers\CoursesController;
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
//избранное
Route::get('courses', [CoursesController::class, 'coursesList'])->name('courses.list');
Route::get('favotits', [FavotitsController::class, 'favotitsList'])->name('favotits.list');
Route::post('favotits', [FavotitsController::class, 'addToFavotits'])->name('favotits.store');
Route::post('update-favotits', [FavotitsController::class, 'updateFavotits'])->name('favotits.update');
Route::post('remove', [FavotitsController::class, 'removeFavotits'])->name('favotits.remove');
Route::post('clear', [FavotitsController::class, 'clearAllFavotits'])->name('favotits.clear');

//авторизация
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
