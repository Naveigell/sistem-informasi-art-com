<?php

namespace Database\Seeders;

use App\Enums\UserRole;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create('id_ID');

        // create admin
        User::create([
            "name"         => "admin@gmail.com",
            "email"        => "admin@gmail.com",
            "password"     => Hash::make(123456),
            "role"         => UserRole::ADMIN,
            "avatar"       => create_default_image(public_path('avatars/avataaars.png'), 'public/users/avatars'),
            "about_me"     => $faker->realText(),
            "phone_number" => $faker->unique()->numerify('08###########'),
        ]);

        // create client
        User::create([
            "name"         => "client@gmail.com",
            "email"        => "client@gmail.com",
            "password"     => Hash::make(123456),
            "role"         => UserRole::CLIENT,
            "avatar"       => create_default_image(public_path('avatars/avataaars.png'), 'public/users/avatars'),
            "about_me"     => $faker->realText(),
            "phone_number" => $faker->unique()->numerify('08###########'),
        ]);

        // create artist
        User::create([
            "name"         => "artist@gmail.com",
            "email"        => "artist@gmail.com",
            "password"     => Hash::make(123456),
            "role"         => UserRole::ARTIST,
            "avatar"       => create_default_image(public_path('avatars/avataaars.png'), 'public/users/avatars'),
            "about_me"     => $faker->realText(),
            "phone_number" => $faker->unique()->numerify('08###########'),
        ]);

        foreach (range(1, 20) as $item) {
            User::create([
                "name"         => $faker->name,
                "email"        => $faker->unique()->email,
                "password"     => Hash::make(123456),
                "role"         => rand(1, 10) < 5 ? UserRole::CLIENT : UserRole::ARTIST,
                "avatar"       => create_default_image(public_path('avatars/avataaars.png'), 'public/users/avatars'),
                "about_me"     => $faker->realText(),
                "phone_number" => $faker->unique()->numerify('08###########'),
            ]);
        }
    }
}
