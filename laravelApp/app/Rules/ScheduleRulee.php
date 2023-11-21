<?php

namespace App\Rules;

use DateTime;
use Faker\Core\Number;
use Illuminate\Contracts\Validation\Rule;

class ScheduleRulee implements Rule
{
    private DateTime $date_time_start;
    private string $type;
    private Number $coupon;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
