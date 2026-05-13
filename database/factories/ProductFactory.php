<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::pluck('id')->toArray();
        $categoryId = !empty($categories) ? $this->faker->randomElement($categories) : 1;

        // Fashion related clothing names
        $adjectives = ['Classic', 'Vintage', 'Modern', 'Elegant', 'Casual', 'Sporty', 'Luxury', 'Premium', 'Essential', 'Urban', 'Chic', 'Cozy'];
        $clothingItems = ['T-Shirt', 'Jacket', 'Jeans', 'Sneakers', 'Dress', 'Sweater', 'Hoodie', 'Coat', 'Blouse', 'Skirt', 'Shorts', 'Scarf', 'Beanie', 'Boots'];

        $productName = $this->faker->randomElement($adjectives) . ' ' . $this->faker->randomElement($clothingItems);

        return [
            'category_id' => $categoryId,
            'name' => $productName,
            'price' => $this->faker->randomFloat(2, 10, 300), // Random price between 10 and 300
            'description' => $this->faker->paragraph(3), // Random description
            // Random fashion image
            'image' => 'https://loremflickr.com/600/600/fashion,clothing?random=' . $this->faker->unique()->numberBetween(1, 100000),
        ];
    }
}
