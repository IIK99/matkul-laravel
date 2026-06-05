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
            ['category' => 'kopi-hitam', 'image' => 'Americano coffee.jpg', 'title' => 'Americano', 'description' => 'Espresso dengan tambahan air panas, cocok untuk pecinta kopi murni.', 'composition' => 'Espresso, Air Panas', 'price' => 15000],
            ['category' => 'latte', 'image' => 'Caramel Coffee.webp', 'title' => 'Caramel Macchiato', 'description' => 'Perpaduan sempurna antara espresso, susu, dan sirup karamel manis.', 'composition' => 'Espresso, Susu, Sirup Karamel', 'price' => 25000],
            ['category' => 'latte', 'image' => 'Vanilla Coffee.jpg', 'title' => 'Vanilla Latte', 'description' => 'Latte lembut dengan sentuhan rasa vanilla yang menenangkan.', 'composition' => 'Espresso, Susu, Sirup Vanilla', 'price' => 22000],
            ['category' => 'latte', 'image' => 'cappuccino coffee.jpg', 'title' => 'Cappuccino', 'description' => 'Kopi klasik dengan takaran espresso dan busa susu yang seimbang.', 'composition' => 'Espresso, Susu Steam, Busa Susu', 'price' => 20000],
            ['category' => 'specialty', 'image' => 'kopi arang.jpg', 'title' => 'Kopi Joss (Arang)', 'description' => 'Kopi unik khas Nusantara yang dicelup dengan arang panas.', 'composition' => 'Kopi Tubruk, Arang Panas', 'price' => 18000],
            ['category' => 'specialty', 'image' => 'kopi gayo aceh.jpg', 'title' => 'Kopi Gayo Aceh', 'description' => 'Kopi single origin dari dataran tinggi Gayo dengan aroma khas.', 'composition' => 'Biji Kopi Gayo', 'price' => 25000],
            ['category' => 'kopi-susu', 'image' => 'kopi gula aren.png', 'title' => 'Es Kopi Gula Aren', 'description' => 'Kopi susu kekinian dengan manisnya gula aren asli yang legit.', 'composition' => 'Espresso, Susu, Gula Aren', 'price' => 18000],
            ['category' => 'specialty', 'image' => 'kopi luwak.jpg', 'title' => 'Kopi Luwak', 'description' => 'Kopi premium nusantara dengan proses fermentasi alami.', 'composition' => 'Biji Kopi Luwak', 'price' => 35000],
            ['category' => 'kopi-susu', 'image' => 'kopi susu.jpg', 'title' => 'Kopi Susu Klasik', 'description' => 'Sajian kopi susu sederhana yang cocok menemani harimu.', 'composition' => 'Kopi, Susu Kental Manis', 'price' => 12000],
            ['category' => 'specialty', 'image' => 'kopi toraja.jpg', 'title' => 'Kopi Toraja', 'description' => 'Kopi khas Sulawesi dengan tingkat keasaman seimbang.', 'composition' => 'Biji Kopi Toraja', 'price' => 24000],
            ['category' => 'kopi-hitam', 'image' => 'kopi tubruk.jpg', 'title' => 'Kopi Tubruk', 'description' => 'Kopi hitam tradisional tanpa ampas yang disaring.', 'composition' => 'Kopi Bubuk, Air Panas', 'price' => 10000],
            ['category' => 'latte', 'image' => 'latte coffee.jpg', 'title' => 'Caffe Latte', 'description' => 'Kopi dengan rasio susu yang lebih banyak untuk rasa yang lebih creamy.', 'composition' => 'Espresso, Susu Steam', 'price' => 22000],
            ['category' => 'latte', 'image' => 'mocha coffee.png', 'title' => 'Mochaccino', 'description' => 'Campuran espresso, coklat, dan susu untuk pecinta rasa manis.', 'composition' => 'Espresso, Susu, Coklat', 'price' => 24000],
        ];

        foreach ($menus as $menu) {
            \App\Models\Menu::create($menu);
        }
    }
}
