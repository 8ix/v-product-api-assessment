<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
        ]);

        Product::factory(100)->create();
        Category::factory(25)->create();

        //get all categories and products
        $categories = Category::all();
        $products = Product::all();

        // Assign 2-5 random categories to each product
        $products->each(function ($product) use ($categories) {
            $randomCategories = $categories->random(rand(2, 3));
            $product->categories()->attach($randomCategories);
        });
    }
}
