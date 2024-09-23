<?php

namespace App\Http\Constants;

class DiscountConstants {
    const TYPE_PERCENTAGE = 1;
    const TYPE_AMOUNT = 2;

    const DISCOUNT_TYPES = [
        self::TYPE_PERCENTAGE => 'Percentage',
        self::TYPE_AMOUNT => 'Amount'
    ];
}
