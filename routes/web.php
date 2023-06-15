<?php

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
Route::get('/', function () {
    return view('recipes', [
        'heading' => 'All recipes!',
        'recipes' => Recipe::all()
    ]);
});

// Single recipe
Route::get('/recipes/{id}', function ($id) {
    return view('recipe', [
        'recipe' => Recipe::find($id)
    ]);
});
