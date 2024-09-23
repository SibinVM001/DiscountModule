<?php

namespace Database\Seeders;

use App\Http\Constants\DiscountConstants;
use App\Models\Discount;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $discounts = [
            [
                'type' => DiscountConstants::TYPE_PERCENTAGE,
                'value' => 10,
                'number_of_uses' => 2,
                'maximum_amount' => 500,
                'family_member_applicable' => true,
                'is_recurring' => false,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_PERCENTAGE,
                'value' => 10,
                'number_of_uses' => 2,
                'maximum_amount' => 500,
                'family_member_applicable' => true,
                'is_recurring' => true,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_PERCENTAGE,
                'value' => 10,
                'number_of_uses' => 2,
                'maximum_amount' => 500,
                'family_member_applicable' => false,
                'is_recurring' => false,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_PERCENTAGE,
                'value' => 10,
                'number_of_uses' => 2,
                'maximum_amount' => 500,
                'family_member_applicable' => false,
                'is_recurring' => true,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_AMOUNT,
                'value' => 300,
                'number_of_uses' => 2,
                'maximum_amount' => 300,
                'family_member_applicable' => true,
                'is_recurring' => false,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_AMOUNT,
                'value' => 300,
                'number_of_uses' => 2,
                'maximum_amount' => 300,
                'family_member_applicable' => true,
                'is_recurring' => true,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_AMOUNT,
                'value' => 300,
                'number_of_uses' => 2,
                'maximum_amount' => 300,
                'family_member_applicable' => false,
                'is_recurring' => false,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ],
            [
                'type' => DiscountConstants::TYPE_AMOUNT,
                'value' => 300,
                'number_of_uses' => 2,
                'maximum_amount' => 300,
                'family_member_applicable' => false,
                'is_recurring' => true,
                'created_at' => Carbon::now(),                
                'updated_at' => Carbon::now()
            ]
        ];

        Discount::insert($discounts);
    }
}
