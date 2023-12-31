<?php

namespace Database\Seeders;

use App\Enums\PaymentStatus;
use App\Enums\RequestStatus;
use App\Enums\UserRole;
use App\Models\Product;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class RequestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker    = Factory::create('id_ID');
        $products = Product::all();
        $clients  = User::where('role', UserRole::CLIENT)->get();

        foreach ($clients as $client) {
            foreach ($products as $product) {

                // 40% chance to skip, because we don't want to make a lot of request
                if (rand(1, 10) > 6) {
                    continue;
                }

                $request = $client->requests()->create([
                    'product_id'     => $product->id,
                    'email'          => $client->email,
                    'quantity'       => rand(1, 5),
                    'requested_date' => now()->subDays(rand(4, 10))->toDateTimeString(),
                    // add status pending or approved
                    // if request has payment below, the status is definitely approved
                    'status'         => Arr::random([RequestStatus::PENDING, RequestStatus::APPROVED]),
                    'description'    => $faker->realTextBetween(3000, 5000),
                ]);

                // 80% chance to approve and make a payment
                if (rand(1, 10) > 2) {
                    DB::transaction(function () use ($request, $product) {
                        // if request has payment, the status is definitely approved
                        $request->update([
                            'status' => RequestStatus::APPROVED,
                        ]);

                        $request->payment()->create([
                            'amount' => $product->price * $request->quantity,
                            'status' => PaymentStatus::PAID,
                        ]);
                    });

                    // 50% chance to finish
                    if (rand(1, 10) > 5) {
                        $request->update([
                            'status' => RequestStatus::FINISHED,
                        ]);
                    }
                }
            }
        }
    }
}
