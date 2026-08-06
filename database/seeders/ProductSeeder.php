<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure there is at least one category to attach products to
        $category = Category::first();
        if (!$category) {
            $category = Category::create([
                'name' => 'General Collection',
                'description' => 'A collection of our finest items.',
                'image' => ''
            ]);
        }

        $products = [];
        for ($i = 1; $i <= 20; $i++) {
            $products[] = [
                'category_id' => $category->id,
                'name' => 'Premium Shirt Model ' . $i,
                'description' => 'This is the description for Premium Shirt Model ' . $i . '. Made from high-quality cotton, offering a perfect blend of style and comfort.',
                'price' => rand(15, 50) + 0.99,
                'image' => '', // Leave image empty as requested by user
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Product::insert($products);
    }
}
