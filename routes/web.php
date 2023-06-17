<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;

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

// All recipes
Route::get('/', [RecipeController::class, 'index']);

// Show create form
Route::get('/recipes/create', [RecipeController::class, 'create']);

// Store recipe data
Route::post('/recipes', [RecipeController::class, 'store']);

// Show edit form
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit']);

// Update edited recipe
Route::put('/recipes/{recipe}', [RecipeController::class, 'update']);

// Delete recipe
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy']);

// Single recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
