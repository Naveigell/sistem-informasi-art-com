<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker   = Factory::create('id_ID');
        $artists = User::where('role', UserRole::ARTIST)->get();

        foreach ($artists as $artist) {
            foreach (range(1, rand(5, 9)) as $item) {
                $artist->products()->create([
                    "name"        => $faker->name,
                    "image"       => create_default_image(public_path('img/thumbnail.png'), 'public/products/images'),
                    "price"       => create_price(rand(1, 9), rand(5, 6)),
                    "description" => $faker->realTextBetween(300, 500),
                ]);
            }
        }
    }
}
