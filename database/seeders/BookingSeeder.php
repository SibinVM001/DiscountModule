<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bookings = [
            [
                'user_id' => 1,
                'schedule_id' => 1,
                'discount_id' => 1,
                'amount' => 1000,
                'net_amount' => 900
            ]
        ];

        Booking::insert($bookings);
    }
}
