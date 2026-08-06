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
        // Remove the previously generated generic products
        Product::where('name', 'like', 'Premium Shirt Model%')->delete();

        $productsData = [
            // T-Shirts (ID: 1)
            [
                'category_id' => 1,
                'name' => 'Essential Cotton V-Neck',
                'description' => 'A classic V-neck t-shirt made from 100% breathable cotton. Perfect for everyday wear.',
                'price' => 19.99,
            ],
            [
                'category_id' => 1,
                'name' => 'Graphic Print Streetwear Tee',
                'description' => 'Oversized streetwear tee featuring a bold graphic print on the back.',
                'price' => 24.99,
            ],
            [
                'category_id' => 1,
                'name' => 'Basic White Undershirt',
                'description' => 'Slim-fit white tee designed for comfort and layering under shirts.',
                'price' => 14.99,
            ],
            [
                'category_id' => 1,
                'name' => 'Vintage Band T-Shirt',
                'description' => 'Authentic vintage wash t-shirt with a classic rock band logo.',
                'price' => 29.99,
            ],
            [
                'category_id' => 1,
                'name' => 'Athletic Performance Tee',
                'description' => 'Moisture-wicking activewear t-shirt for workouts and running.',
                'price' => 22.99,
            ],

            // Shoes (ID: 5)
            [
                'category_id' => 5,
                'name' => 'Classic Canvas Sneakers',
                'description' => 'Timeless low-top canvas sneakers, perfect for a casual day out.',
                'price' => 45.00,
            ],
            [
                'category_id' => 5,
                'name' => 'Running Athletic Shoes',
                'description' => 'Lightweight running shoes with memory foam insoles for maximum comfort.',
                'price' => 89.99,
            ],
            [
                'category_id' => 5,
                'name' => 'Leather Oxford Dress Shoes',
                'description' => 'Elegant genuine leather oxfords for formal occasions and business attire.',
                'price' => 120.00,
            ],
            [
                'category_id' => 5,
                'name' => 'Casual Suede Loafers',
                'description' => 'Slip-on suede loafers offering a blend of comfort and sophisticated style.',
                'price' => 65.50,
            ],
            [
                'category_id' => 5,
                'name' => 'High-Top Basketball Sneakers',
                'description' => 'Premium high-top sneakers with ankle support and responsive cushioning.',
                'price' => 110.00,
            ],

            // Dresses (ID: 4)
            [
                'category_id' => 4,
                'name' => 'Floral Summer Maxi Dress',
                'description' => 'Flowy maxi dress with a vibrant floral print, ideal for summer days.',
                'price' => 35.99,
            ],
            [
                'category_id' => 4,
                'name' => 'Elegant Evening Gown',
                'description' => 'A stunning floor-length gown featuring sequin details and a slit.',
                'price' => 150.00,
            ],
            [
                'category_id' => 4,
                'name' => 'Casual Denim Mini Dress',
                'description' => 'Button-down denim mini dress with pockets for a chic, casual look.',
                'price' => 42.00,
            ],
            [
                'category_id' => 4,
                'name' => 'Ribbed Knit Midi Dress',
                'description' => 'Bodycon ribbed knit dress that elegantly flatters your silhouette.',
                'price' => 28.99,
            ],
            [
                'category_id' => 4,
                'name' => 'Boho Off-Shoulder Dress',
                'description' => 'Lightweight bohemian style off-shoulder dress with ruffle details.',
                'price' => 32.50,
            ],

            // Accessories (ID: 3)
            [
                'category_id' => 3,
                'name' => 'Minimalist Leather Wallet',
                'description' => 'Slim genuine leather wallet with RFID blocking technology.',
                'price' => 25.00,
            ],
            [
                'category_id' => 3,
                'name' => 'Classic Aviator Sunglasses',
                'description' => 'Polarized aviator sunglasses with UV400 protection.',
                'price' => 18.99,
            ],
            [
                'category_id' => 3,
                'name' => 'Stainless Steel Chronograph Watch',
                'description' => 'Water-resistant luxury watch featuring a chronometer and date display.',
                'price' => 199.99,
            ],
            [
                'category_id' => 3,
                'name' => 'Canvas Tote Bag',
                'description' => 'Durable eco-friendly canvas tote bag for groceries or daily use.',
                'price' => 12.00,
            ],
            [
                'category_id' => 3,
                'name' => 'Wool Fedora Hat',
                'description' => 'Stylish wide-brim wool fedora to complete your autumn outfit.',
                'price' => 22.00,
            ],
        ];

        $products = [];
        foreach ($productsData as $data) {
            $products[] = [
                'category_id' => $data['category_id'],
                'name' => $data['name'],
                'description' => $data['description'],
                'price' => $data['price'],
                'image' => '', // Leave empty as requested
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        Product::insert($products);
    }
}
