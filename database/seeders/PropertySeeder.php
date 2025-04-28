<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        $faker = \Faker\Factory::create();

        $userId = User::inRandomOrder()->first()?->id ?? 1;

        $imageUrls = [
            "https://images.unsplash.com/photo-1600585154340-be6161a56a0c",
            "https://images.unsplash.com/photo-1570129477492-45c003edd2be",
            "https://images.unsplash.com/photo-1580587771525-78b9dba3b914",
            "https://images.unsplash.com/photo-1586105251261-72a756497a12",
            "https://images.unsplash.com/photo-1572120360610-d971b9b63971",
            "https://images.unsplash.com/photo-1600585154203-5c3b67a5f3a2",
            "https://images.unsplash.com/photo-1599423300746-b62533397364",
            "https://images.unsplash.com/photo-1572120362071-1a71f12f4c1b",
            "https://images.unsplash.com/photo-1593854459734-b4f58a9ef42f",
            "https://images.unsplash.com/photo-1580587771525-78b9dba3b914",
            "https://images.unsplash.com/photo-1600585154254-3282a5fba3ed",
            "https://images.unsplash.com/photo-1605276376824-6ec8378f57b8",
            "https://images.unsplash.com/photo-1560448075-bb4b7dba09d7",
            "https://images.unsplash.com/photo-1599423300746-b62533397364",
            "https://images.unsplash.com/photo-1600047509233-47e1e74e843f",
            "https://images.unsplash.com/photo-1588854337221-4f1d5b4dc9d3",
            "https://images.unsplash.com/photo-1542314831-068cd1dbfeeb",
            "https://images.unsplash.com/photo-1572120360709-79c4f8cf2346",
            "https://images.unsplash.com/photo-1564013799919-ab600027ffc6",
            "https://images.unsplash.com/photo-1580587771525-78b9dba3b914",
            "https://images.unsplash.com/photo-1605276376973-1ecbc6e7c04e",
            "https://images.unsplash.com/photo-1600585153882-4e479e00c72e",
            "https://images.unsplash.com/photo-1599423300746-b62533397364",
            "https://images.unsplash.com/photo-1572120362126-276cae4f47bc",
            "https://images.unsplash.com/photo-1586105251261-72a756497a12",
            "https://images.unsplash.com/photo-1565182999561-18d7dc61ebc7",
            "https://images.unsplash.com/photo-1560448075-bb4b7dba09d7",
            "https://images.unsplash.com/photo-1600047509233-47e1e74e843f",
            "https://images.unsplash.com/photo-1600585153925-43bcbeb38c14",
            "https://images.unsplash.com/photo-1593854459734-b4f58a9ef42f",
            "https://images.unsplash.com/photo-1580587771525-78b9dba3b914",
            "https://images.unsplash.com/photo-1605276376824-6ec8378f57b8",
            "https://images.unsplash.com/photo-1572120362474-6d14b66b3c2b",
            "https://images.unsplash.com/photo-1580587771525-78b9dba3b914",
            "https://images.unsplash.com/photo-1564013799919-ab600027ffc6",
            "https://images.unsplash.com/photo-1599423300746-b62533397364",
            "https://images.unsplash.com/photo-1600047509233-47e1e74e843f",
            "https://images.unsplash.com/photo-1588854337221-4f1d5b4dc9d3",
            "https://images.unsplash.com/photo-1542314831-068cd1dbfeeb",
            "https://images.unsplash.com/photo-1572120360709-79c4f8cf2346",
        ];

        for ($i = 0; $i < 40; $i++) {
            Property::create([
                'user_id' => $userId,
                'title' => $faker->sentence,
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 100000, 1000000),
                'address' => $faker->address,
                'type' => $faker->randomElement(['rent', 'sale']),
                'bedrooms' => $faker->numberBetween(1, 5),
                'bathrooms' => $faker->numberBetween(1, 4),
                'area' => $faker->randomFloat(2, 50, 500),
                'floor' => $faker->numberBetween(0, 10),
                'total_floors' => $faker->numberBetween(1, 20),
                'construction_year' => $faker->year,
                'furnished' => $faker->randomElement(['furnished', 'semi_furnished', 'unfurnished']),
                'amenities' => json_encode($faker->randomElements(['elevator', 'parking', 'pool', 'gym', 'security'], rand(1, 3))),
                'city' => $faker->city,
                'neighborhood' => $faker->streetName,
                'latitude' => $faker->latitude,
                'longitude' => $faker->longitude,
                'status' => $faker->randomElement(['available', 'sold', 'rented', 'pending']),
                'images' => json_encode([
                    [
                        'path' => $imageUrls[$i],
                        'room_type' => 'general',
                        'description' => 'صورة للعقار'
                    ]
                ])
            ]);
        }
    }
}
