<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menus = [
            ['category' => 'pizza', 'image' => 'f1.png', 'title' => 'Delicious Pizza', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Dough, Tomato Sauce, Cheese, Pepperoni', 'price' => 20],
            ['category' => 'burger', 'image' => 'f2.png', 'title' => 'Delicious Burger', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Beef Patty, Lettuce, Tomato, Cheese, Bun', 'price' => 15],
            ['category' => 'pizza', 'image' => 'f3.png', 'title' => 'Delicious Pizza', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Dough, Tomato Sauce, Cheese, Mushroom', 'price' => 17],
            ['category' => 'pasta', 'image' => 'f4.png', 'title' => 'Delicious Pasta', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Pasta, Tomato Sauce, Minced Meat, Parmesan', 'price' => 18],
            ['category' => 'fries', 'image' => 'f5.png', 'title' => 'French Fries', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Potato, Salt, Vegetable Oil', 'price' => 10],
            ['category' => 'pizza', 'image' => 'f6.png', 'title' => 'Delicious Pizza', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Dough, Cheese, Olive Oil, Garlic', 'price' => 15],
            ['category' => 'burger', 'image' => 'f7.png', 'title' => 'Tasty Burger', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Chicken Patty, Lettuce, Mayo, Bun', 'price' => 12],
            ['category' => 'burger', 'image' => 'f8.png', 'title' => 'Tasty Burger', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Double Beef Patty, Cheese, Onion, BBQ Sauce', 'price' => 14],
            ['category' => 'pasta', 'image' => 'f9.png', 'title' => 'Delicious Pasta', 'description' => 'Veniam debitis quaerat officiis quasi cupiditate quo, quisquam velit, magnam voluptatem repellendus sed eaque', 'composition' => 'Pasta, Cream Sauce, Bacon, Black Pepper', 'price' => 10],
        ];

        foreach ($menus as $menu) {
            \App\Models\Menu::create($menu);
        }
    }
}
