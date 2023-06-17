<?php

use App\Http\Controllers\RecipeController;
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

// Common Resource Routes:
// index - Show all recipes
// show - Show single recipe
// create - Show form to create new recipe
// store - Store new recipe
// edit - Show form to edit recipe
// update - Update recipe
// destroy - Delete recipe

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
