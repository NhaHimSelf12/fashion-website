<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);

        // Create Customer User
        User::create([
            'name' => 'Test Customer',
            'email' => 'customer@test.com',
            'password' => Hash::make('password'),
            'role' => 'customer',
        ]);

        // Create Categories
        $catTshirts = Category::create(['name' => 'T-Shirts']);
        $catJeans = Category::create(['name' => 'Jeans & Denim']);
        $catAccessories = Category::create(['name' => 'Accessories']);
        $catDresses = Category::create(['name' => 'Dresses']);
        $catShoes = Category::create(['name' => 'Shoes']);

        // Create 20 Specific Products (Clothes & Shoes)
        $products = [
            // Shirts / Tops
            ['category_id' => $catTshirts->id, 'name' => 'Classic White T-Shirt', 'price' => 15.99, 'description' => 'A comfortable, 100% cotton classic white t-shirt.', 'image' => 'https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catTshirts->id, 'name' => 'Black Graphic Tee', 'price' => 18.50, 'description' => 'Soft black graphic t-shirt for casual wear.', 'image' => 'https://images.unsplash.com/photo-1583743814966-8936f5b7be1a?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catTshirts->id, 'name' => 'Yellow Summer Shirt', 'price' => 22.00, 'description' => 'Bright yellow summer shirt.', 'image' => 'https://images.unsplash.com/photo-1581655353564-df123a1eb820?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catTshirts->id, 'name' => 'Casual Button Down', 'price' => 35.00, 'description' => 'A casual button-down shirt for any occasion.', 'image' => 'https://images.unsplash.com/photo-1596755094514-f87e32f85e23?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catTshirts->id, 'name' => 'Cozy Grey Hoodie', 'price' => 45.00, 'description' => 'Warm and comfortable grey hoodie.', 'image' => 'https://images.unsplash.com/photo-1556821840-3a63f95609a7?auto=format&fit=crop&w=500&q=80'],
            
            // Jackets / Denim
            ['category_id' => $catJeans->id, 'name' => 'Blue Denim Jacket', 'price' => 59.99, 'description' => 'A stylish blue denim jacket.', 'image' => 'https://images.unsplash.com/photo-1576871337622-98d48d1cf531?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catJeans->id, 'name' => 'Classic Leather Jacket', 'price' => 120.00, 'description' => 'Premium black leather jacket.', 'image' => 'https://images.unsplash.com/photo-1520975954732-57dd22299614?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catJeans->id, 'name' => 'Slim Fit Dark Jeans', 'price' => 45.00, 'description' => 'Sleek and versatile dark slim fit jeans.', 'image' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catJeans->id, 'name' => 'Light Blue Jeans', 'price' => 42.00, 'description' => 'Comfortable light blue washed jeans.', 'image' => 'https://images.unsplash.com/photo-1582552938357-32b906df40cb?auto=format&fit=crop&w=500&q=80'],
            
            // Shoes
            ['category_id' => $catShoes->id, 'name' => 'Premium Leather Shoes', 'price' => 89.99, 'description' => 'High-quality brown leather shoes.', 'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catShoes->id, 'name' => 'Red Running Sneakers', 'price' => 75.00, 'description' => 'Sporty red sneakers for running and casual wear.', 'image' => 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catShoes->id, 'name' => 'White Casual Sneakers', 'price' => 65.00, 'description' => 'Clean white sneakers for everyday use.', 'image' => 'https://images.unsplash.com/photo-1560769629-975ec94e6a86?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catShoes->id, 'name' => 'Classic Yellow Boots', 'price' => 110.00, 'description' => 'Durable yellow boots for outdoor activities.', 'image' => 'https://images.unsplash.com/photo-1520639888713-7851133b1ed0?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catShoes->id, 'name' => 'Elegant High Heels', 'price' => 95.00, 'description' => 'Elegant black high heels for formal events.', 'image' => 'https://images.unsplash.com/photo-1543163521-1bf539c55dd2?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catShoes->id, 'name' => 'Retro Running Shoes', 'price' => 85.00, 'description' => 'Comfortable retro style running shoes.', 'image' => 'https://images.unsplash.com/photo-1525966222134-fcfa99b8ae77?auto=format&fit=crop&w=500&q=80'],
            
            // Dresses
            ['category_id' => $catDresses->id, 'name' => 'Floral Summer Dress', 'price' => 34.99, 'description' => 'A light, breezy floral dress.', 'image' => 'https://images.unsplash.com/photo-1515347619362-72861df40082?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catDresses->id, 'name' => 'Elegant Red Dress', 'price' => 55.00, 'description' => 'A stunning red dress for evening wear.', 'image' => 'https://images.unsplash.com/photo-1572804013309-59a88b7e92f1?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catDresses->id, 'name' => 'White Silk Dress', 'price' => 65.00, 'description' => 'Luxurious white silk dress.', 'image' => 'https://images.unsplash.com/photo-1539008835657-9e8e9680c956?auto=format&fit=crop&w=500&q=80'],
            
            // Accessories
            ['category_id' => $catAccessories->id, 'name' => 'Winter Beanie Hat', 'price' => 12.50, 'description' => 'Keep warm in style with this cozy knitted beanie.', 'image' => 'https://images.unsplash.com/photo-1576871337632-b9aef4c17ab9?auto=format&fit=crop&w=500&q=80'],
            ['category_id' => $catAccessories->id, 'name' => 'Classic Wrist Watch', 'price' => 150.00, 'description' => 'Premium analog wrist watch with leather strap.', 'image' => 'https://images.unsplash.com/photo-1524592094714-0f0654e20314?auto=format&fit=crop&w=500&q=80'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
