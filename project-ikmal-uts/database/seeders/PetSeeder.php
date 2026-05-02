<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pets = [
            ['name' => 'Kucing Persia', 'image' => 'f1.jpg', 'species' => 'kucing', 'breed' => 'Persia', 'gender' => 'Male', 'description' => 'Kucing persia yang sangat lucu dan menggemaskan.', 'age' => 12],
            ['name' => 'Kucing Anggora', 'image' => 'f2.jpg', 'species' => 'kucing', 'breed' => 'Anggora', 'gender' => 'Female', 'description' => 'Kucing anggora berbulu lebat dan aktif bermain.', 'age' => 8],
            ['name' => 'Kucing Kampung', 'image' => 'f3.jpg', 'species' => 'kucing', 'breed' => 'Domestik', 'gender' => 'Male', 'description' => 'Kucing kampung yang mandiri dan sehat.', 'age' => 24],
            ['name' => 'Kucing Himalaya', 'image' => 'f4.jpg', 'species' => 'kucing', 'breed' => 'Himalaya', 'gender' => 'Female', 'description' => 'Kucing cantik perpaduan persia dan siam.', 'age' => 10],
            ['name' => 'Kucing Munchkin', 'image' => 'f5.jpg', 'species' => 'kucing', 'breed' => 'Munchkin', 'gender' => 'Male', 'description' => 'Kucing berkaki pendek yang sangat lincah.', 'age' => 6],
            ['name' => 'Kucing British Shorthair', 'image' => 'f6.jpg', 'species' => 'kucing', 'breed' => 'Shorthair', 'gender' => 'Female', 'description' => 'Kucing gemuk dengan pipi tembem yang menggemaskan.', 'age' => 15],
            ['name' => 'Burung Macaw', 'image' => 'f7.jpg', 'species' => 'burung', 'breed' => 'Macaw', 'gender' => 'Male', 'description' => 'Burung beo besar dengan bulu berwarna-warni mencolok.', 'age' => 24],
            ['name' => 'Burung Nuri', 'image' => 'f8.jpg', 'species' => 'burung', 'breed' => 'Nuri', 'gender' => 'Female', 'description' => 'Burung pintar dan ramah, cocok untuk teman bermain.', 'age' => 12],
            ['name' => 'Burung Kakaktua', 'image' => 'f9.jpg', 'species' => 'burung', 'breed' => 'Kakaktua', 'gender' => 'Male', 'description' => 'Burung cerdas yang bisa dilatih dan diajak bicara.', 'age' => 36],
            ['name' => 'Ikan Koi', 'image' => 'f10.jpg', 'species' => 'ikan', 'breed' => 'Koi', 'gender' => 'Unknown', 'description' => 'Ikan hias kolam yang dipercaya membawa keberuntungan.', 'age' => 8],
            ['name' => 'Ikan Arwana', 'image' => 'f11.jpg', 'species' => 'ikan', 'breed' => 'Arwana Super Red', 'gender' => 'Unknown', 'description' => 'Ikan eksotis mahal dengan warna merah menyala.', 'age' => 10],
            ['name' => 'Ikan Mas Koki', 'image' => 'f12.jpg', 'species' => 'ikan', 'breed' => 'Mas Koki', 'gender' => 'Unknown', 'description' => 'Ikan hias akuarium berbentuk unik dan lambat berenang.', 'age' => 6],
            ['name' => 'Anjing Golden', 'image' => 'f13.png', 'species' => 'anjing', 'breed' => 'Golden Retriever', 'gender' => 'Male', 'description' => 'Anjing besar, ramah, dan sangat penyayang.', 'age' => 14],
            ['name' => 'Anjing Husky', 'image' => 'f14.png', 'species' => 'anjing', 'breed' => 'Siberian Husky', 'gender' => 'Female', 'description' => 'Anjing enerjik yang butuh banyak aktivitas.', 'age' => 18],
            ['name' => 'Anjing Bulldog', 'image' => 'f15.jpg', 'species' => 'anjing', 'breed' => 'Bulldog', 'gender' => 'Male', 'description' => 'Anjing tangguh berwajah seram tapi berhati lembut.', 'age' => 20],
        ];

        foreach ($pets as $pet) {
            Menu::create($pet);
        }
    }
}
