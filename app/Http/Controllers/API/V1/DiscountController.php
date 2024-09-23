<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Constants\DiscountConstants;
use App\Http\Controllers\ApiBaseController;
use App\Models\{Booking, User, Discount};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use Exception;

class DiscountController extends ApiBaseController
{    
    /**
     * Apply the discount
     *
     * @param  mixed $request
     * @return void
     */
    public function applyDiscount(Request $request)
    {
        $response = [];

        try {
            $validator = Validator::make($request->all(), [
                'user_id' => 'required|exists:users,id',
                'schedule_id' => 'required|exists:schedules,id'
            ]);

            if ($validator->fails()) {
                return $this->sendError('Validation failed', $validator->errors()->toArray());
            } else {
                $user = User::find($request->user_id);

                $familyBookings = Booking::leftJoin('users', 'users.id', '=', 'bookings.user_id')
                                    ->where('users.family_id', $user->family_id)
                                    ->where('bookings.schedule_id', $request->schedule_id)
                                    ->first();

                if ($familyBookings && $familyBookings->discount_id) {
                    $discount = Discount::find($familyBookings->discount_id);

                    $response = [
                        'user_id' => $request->user_id,
                        'schedule_id' => $request->schedule_id,
                        'amount' => $familyBookings->amount,
                        'discount_type' => DiscountConstants::DISCOUNT_TYPES[$discount->type],
                        'discount_value' => $discount->value,
                        'net_amount' => $familyBookings->amount - self::calculateDiscount($discount, $familyBookings->amount)
                    ];

                    return $this->sendResponse($response, 'Discount applied successfully!');
                } else {
                    return $this->sendError("There is no Family Member discount found!.");
                }
            }
        } catch (Exception $ex) {
            return $this->sendError("Something went wrong. Please try again later.");
        }  
    }
    
    /**
     * Calculate the discount amount
     *
     * @param mixed $discount
     * @param int $amount
     * @return int
     */
    public static function calculateDiscount($discount, $amount)
    {
        $netAmount = $amount;

        if ($discount->value != 0) {
            if ($discount->type == DiscountConstants::TYPE_AMOUNT) {
                $netAmount = $discount->value;
            } else if ($discount->type == DiscountConstants::TYPE_PERCENTAGE) {
                $netAmount = ($discount->value * $amount) / 100;
            }
        }

        return $netAmount;
    }
}
