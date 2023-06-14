<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\KeywordIngredient;
use App\Models\KeywordType;
use App\Models\Recipe;
use App\Models\Picture;
use App\Models\User;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $user = new User();
        $user->name = 'test_user';
        $user->password = Hash::make('test');
        $user->email = 'test@email.com';
        $user->save();

        $user_recipe = new User();
        $user_recipe->name = 'test_recipe_user';
        $user_recipe->password = Hash::make('test1');
        $user_recipe->email = 'testr@email.com';
        $user_recipe->save();
        
        KeywordType::create(['name' => 'Cake']);
        KeywordIngredient::create(['name' => 'Flour']);
        KeywordIngredient::create(['name' => 'Egg']);
        KeywordIngredient::create(['name' => 'Sugar']);
        KeywordIngredient::create(['name' => 'Milk']);

        $cake = KeywordType::where('name', 'Cake')->first();
        $flour = KeywordIngredient::where('name', 'Flour')->first();
        $egg = KeywordIngredient::where('name', 'Egg')->first();
        $sugar = KeywordIngredient::where('name', 'Sugar')->first();
        $milk = KeywordIngredient::where('name', 'Milk')->first();

        $recipe = Recipe::create([
                'name' => "Strawberry shortcake",
                'description' => 'Crazy delicious scrumdiddlyumptious cake.',
                'steps' => '1. Get strawberries. 2. Bake cake.'
        ]);
        $recipe->users()->associate($user_recipe);
        $recipe->save();

        $recipe->types()->attach($cake);
        $recipe->ingredients()->attach($flour);
        $recipe->ingredients()->attach($egg);
        $recipe->ingredients()->attach($sugar);
        $recipe->ingredients()->attach($milk);

        Picture::create(['link' => '...\link\to\pic']);
        $picture = Picture::where('link', '...\link\to\pic')->first();
        $picture->recipes()->associate($recipe);
        $user_recipe->recipes()->save($recipe);


        $comment = new Comment();
        $comment->comment = 'ABSOLUTE GARBAGE! DISGUSTING!!';
        $user->comments()->save($comment);
    }
}
