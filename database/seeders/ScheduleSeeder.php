<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedules = [
            [
                'title' => 'Test - 1',
                'description' => 'Test Description',
                'amount' => 1000,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Test - 2',
                'description' => 'Test Description',
                'amount' => 2000,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ]
        ];

        Schedule::insert($schedules);
    }
}
