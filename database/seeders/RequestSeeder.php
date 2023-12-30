<?php

namespace Database\Seeders;

use App\Enums\PaymentStatus;
use App\Enums\RequestStatus;
use App\Enums\UserRole;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
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
        $products = Product::all();
        $clients  = User::where('role', UserRole::CLIENT)->get();

        foreach ($clients as $client) {
            foreach ($products as $product) {

                // 90% chance to skip, because we don't want to make a lot of request
                if (rand(1, 10) > 1) {
                    continue;
                }

                $request = $client->requests()->create([
                    'product_id'     => $product->id,
                    'quantity'       => rand(1, 5),
                    'requested_date' => now()->toDateTimeString(),
                    'status'         => RequestStatus::PENDING,
                ]);

                // 70% chance to approve and make a payment
                if (rand(1, 10) > 3) {
                    DB::transaction(function () use ($request, $product) {
                        $request->update([
                            'status' => RequestStatus::APPROVED,
                        ]);

                        $request->payment()->create([
                            'amount' => $product->price * $request->quantity,
                            'status' => PaymentStatus::PENDING,
                        ]);
                    });
                }
            }
        }
    }
}
