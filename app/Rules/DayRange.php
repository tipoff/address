<?php

namespace App\Rules;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class DayRange implements Rule
{
    /**
     * @var Carbon
     */
    protected $initialDate;

    /**
     * @var int
     */
    protected $days;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($initialDate, $days = 7)
    {
        $this->initialDate = Carbon::parse($initialDate);
        $this->days = $days;
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
        return $this->initialDate->diffInDays($value) < $this->days;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute must be maximum :value days from initial date.';
    }
}
