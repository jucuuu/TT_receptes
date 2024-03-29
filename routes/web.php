<?php

use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OAuthController;
use Illuminate\Support\Facades\Route;
use App\Models\Recipe;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Redirect user if registers/logins with Twitter
Route::controller(OAuthController::class)->group(function () {
    Route::get('/auth/redirect/twitter', 'redirect')->name('oauth.redirect');
    Route::get('/auth/callback/twitter', 'callback')->name('oauth.callback');
});

//Route::get('/sign-in/twitter/redirect', [OAuthController::class, 'redirect'])->name('oauth.redirect');
//Route::get('/sign-in/twitter/callback', [OAuthController::class, 'callback'])->name('oauth.callback');

Route::resource('recipes', RecipeController::class);

// All recipes
Route::get('/', [RecipeController::class, 'index']);

// Show recipe create form
Route::get('/recipes/create', [RecipeController::class, 'create'])->middleware('auth');

// Store recipe data
Route::post('/recipes', [RecipeController::class, 'store'])->middleware('auth');

// Show recipe edit form
Route::get('/recipes/{recipe}/edit', [RecipeController::class, 'edit'])->name('recipes.edit')->middleware('auth');

// Update edited recipe
Route::put('/recipes/{recipe}', [RecipeController::class, 'update'])->name('recipes.update')->middleware('auth');

// Delete recipe
Route::delete('/recipes/{recipe}', [RecipeController::class, 'destroy'])->middleware('auth');

Route::resource('comments', CommentController::class);

// Store comment
Route::post('/recipes/{recipe}', [CommentController::class, 'store'])->name('comments.store');

// Show comment edit form
Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit')->middleware('auth');

// Update edited comment
Route::put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');

Route::get('/lang/{lang}', function ($lang) {
    if (! in_array($lang, ['en', 'lv', 'de'])) {
        abort(404);
    }
    
    App::setLocale($lang);
    session()->put('lang', $lang);
    return redirect()->back();
})->name('lang');

// Single recipe
Route::get('/recipes/{recipe}', [RecipeController::class, 'show']);

require __DIR__.'/auth.php';
