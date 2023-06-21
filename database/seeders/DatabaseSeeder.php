<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Comment;
use App\Models\Type;
use App\Models\Ingredient;
use App\Models\Measurement;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // Roles:
        $admin = Role::create(['name' => 'admin']);
        $authorised = Role::create(['name' => 'authorised']);

        // Create dummy users, give 'authorised' role by default:
        User::factory()->count(4)->create();
        Recipe::factory(4)->create();
        Comment::factory(3)->create();

        User::factory()->create([
            'name' => 'Meow',
            'username' => 'Meowzer',
            'email' => 'meowzer@gmail.com',
            'password' => Hash::make('11111111'),
        ]);

        User::factory()->create([
            'name' => 'Meow2',
            'username' => 'Meowzer2',
            'email' => 'meowzer2@gmail.com',
            'password' => Hash::make('22222222'),
        ]);

        $meowzer = User::where('username', 'Meowzer')->first();

        // Permissions:
        $post_recipe = Permission::create(['name' => 'post recipes']);
        $edit_recipe = Permission::create(['name' => 'edit recipes']);
        $post_comment = Permission::create(['name' => 'post comments']);
        $edit_comment = Permission::create(['name' => 'edit comments']);
        $delete_recipe = Permission::create(['name' => 'delete recipes']);
        $register = Permission::create(['name' => 'register']);
        $login = Permission::create(['name' => 'login']);
        $logout = Permission::create(['name' => 'logout']);

        $allPermissions = Permission::all();

        // Grant roles to users:
        $meowzer->assignRole('admin');
        $users = User::all();
        foreach($users as $user) {
            $user->assignRole('authorised');
        }

        // Grant roles certain permissions:
        $authorised->givePermissionTo('post recipes');
        $authorised->givePermissionTo('post comments');
        $authorised->givePermissionTo('edit recipes');
        $authorised->givePermissionTo('logout');
        
        $admin->givePermissionTo($allPermissions);
        $admin->revokePermissionTo('register');
        $admin->revokePermissionTo('login');
        $authorised->revokePermissionTo('register');
        $authorised->revokePermissionTo('login');


        // Dish types:
        $cake = new Type();
        $cake->name = 'cake';
        $cake->save();

        $dessert = new Type();
        $dessert->name = 'dessert';
        $dessert->save();

        $soup = new Type();
        $soup->name = 'soup';
        $soup->save();

        $salad = new Type();
        $salad->name = 'salad';
        $salad->save();

        $bread = new Type();
        $bread->name = 'bread';
        $bread->save();

        $curry = new Type();
        $curry->name = 'curry';
        $curry->save();

        $roast = new Type();
        $roast->name = 'roast';
        $roast->save();

        $stew = new Type();
        $stew->name = 'stew';
        $stew->save();

        $pizza = new Type();
        $pizza->name = 'pizza';
        $pizza->save();

        $sandwich = new Type();
        $sandwich->name = 'sandwich';
        $sandwich->save();

        $pie = new Type();
        $pie->name = 'pie';
        $pie->save();

        $pastry = new Type();
        $pastry->name = 'pastry';
        $pastry->save();

        $drink = new Type();
        $drink->name = 'drink';
        $drink->save();

        $muffin = new Type();
        $muffin->name = 'muffin';
        $muffin->save();

        // Measurements:
        $ml = new Measurement();
        $ml->name = 'milileter';
        $ml->short = 'mL';
        $ml->save();

        $g = new Measurement();
        $g->name = 'gram';
        $g->short = 'g';
        $g->save();

        $tsp = new Measurement();
        $tsp->name = 'teaspoon';
        $tsp->short = 'tsp';
        $tsp->save();

        $tbsp = new Measurement();
        $tbsp->name = 'tablespoon';
        $tbsp->short = 'tbsp';
        $tbsp->save();

        $p = new Measurement();
        $p->name = 'pinch';
        $p->short = 'pinch';
        $p->save();

        $d = new Measurement();
        $d->name = 'drop';
        $d->short = 'drop';
        $d->save();

        // Ingredients:
        $flour = new Ingredient();
        $flour->name = 'flour';
        $flour->save();

        $sugar = new Ingredient();
        $sugar->name = 'sugar';
        $sugar->save();

        $egg = new Ingredient();
        $egg->name = 'egg';
        $egg->save();

        $ooil = new Ingredient();
        $ooil->name = 'olive oil';
        $ooil->save();

        $chicken = new Ingredient();
        $chicken->name = 'chicken';
        $chicken->save();

        $rice = new Ingredient();
        $rice->name = 'rice';
        $rice->save();

        $ubutter = new Ingredient();
        $ubutter->name = 'unsalted butter';
        $ubutter->save();

        $salt = new Ingredient();
        $salt->name = 'salt';
        $salt->save();

        $pork = new Ingredient();
        $pork->name = 'pork';
        $pork->save();

        $beef = new Ingredient();
        $beef->name = 'beef';
        $beef->save();

        $cheese = new Ingredient();
        $cheese->name = 'cheese';
        $cheese->save();

        $almonds = new Ingredient();
        $almonds->name = 'almonds';
        $almonds->save();

        $shrimp = new Ingredient();
        $shrimp->name = 'shrimp';
        $shrimp->save();
    }
}
