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
/*Отзывы*/ 
Route::get('/reviews', [\App\Http\Controllers\MainController::class, 'reviews'])->name('reviews');
/*Отзывы*/ 
Route::post('/reviews/check', [\App\Http\Controllers\MainController::class, 'reviews_check'])->name('reviews_check');

//избранное
Route::get('/', [CoursesController::class, 'coursesList'])->name('courses.list');
Route::get('favorit', [FavoritsController::class, 'favoritList'])->name('favorit.list');
Route::post('favorit', [FavoritsController::class, 'addToFavorit'])->name('favorit.store');
Route::post('update-favorit', [FavoritsController::class, 'updateFavorit'])->name('favorit.update');
Route::post('remove', [FavoritsController::class, 'removeFavorit'])->name('favorit.remove');
Route::post('clear', [FavoritsController::class, 'clearAllFavorit'])->name('favorit.clear');

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
