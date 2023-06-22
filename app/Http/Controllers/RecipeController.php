<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use App\Models\Type;

class RecipeController extends Controller
{
    // Show all recipes
    public function index() {
        return view('recipes.index', [
            'recipes' => Recipe::latest()->filter(request(['ttag', 'itag', 'search']))->paginate(6)
        ]);
    }

    // Show single recipe
    public function show(Recipe $recipe) {
        return view('recipes.show', [
            'recipe' => $recipe,
            'comments' => $recipe->comments->sortByDesc('created_at')
        ]);
    }

    // Show create form
    public function create() {
        return view('recipes.create', [
            'types' => Type::all()
        ]);
    }

    // Store recipe data
    public function store(Request $request) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type_tags' => 'required',
            'ingredient_tags' => 'required',
            'steps' => 'required'
        ]);

        if($request->file('cover')) {
            $formFields['cover'] = $request->validate([
                'cover' => 'mimes:jpeg,png,jpg|max:8192'
            ]);
            $formFields['cover'] = $request->file('cover')->store('images', 'public');
        }

        $formFields['user_id'] = Auth::id();

        Recipe::create($formFields);

        return redirect('/')->with('message', 'Recipe posted successfully!');
    }

    // Show edit form
    public function edit(Recipe $recipe) {
        return view('recipes.edit', ['recipe' => $recipe]);
    }

    // Store updated recipe
    public function update(Request $request, Recipe $recipe) {
        $formFields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type_tags' => 'required',
            'ingredient_tags' => 'required',
            'steps' => 'required',
        ]);

        if($request->file('cover')) {
            $formFields['cover'] = $request->validate([
                'cover' => 'mimes:jpeg,png,jpg|max:8192'
            ]);
            $formFields['cover'] = $request->file('cover')->store('images', 'public');
        }

        $recipe->update($formFields);

        return redirect('/recipes/'.$recipe->id)->with('message', 'Recipe updated successfully!');
    }

    // Delete recipe
    public function destroy(Recipe $recipe) {
        $recipe->delete();
        return redirect('/')->with('message', 'Recipe deleted successfully.');
    }

    // create - Show form to create new recipe
    // store - Store new recipe
    // edit - Show form to edit recipe
    // update - Update recipe
    // destroy - Delete recipe
}
