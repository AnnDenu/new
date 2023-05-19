<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FavoritsController;
use App\Http\Controllers\ProfileController;
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

//Route::get('/', function () {
//    return view('welcome');
//});
//избранное
Route::get('/', [CoursesController::class, 'coursesList'])->name('courses.list');
Route::get('favotits', [FavoritsController::class, 'favoritsList'])->name('favorits.list');
Route::post('favotits', [FavoritsController::class, 'addToFavorits'])->name('favorits.store');
Route::post('update-favotits', [FavoritsController::class, 'updateFavorits'])->name('favorits.update');
Route::post('remove', [FavoritsController::class, 'removeFavorits'])->name('favorits.remove');
Route::post('clear', [FavoritsController::class, 'clearAllFavorits'])->name('favorits.clear');

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
