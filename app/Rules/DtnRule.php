<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class DtnRule implements Rule
{
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

        $date = \date('Y/m/d',strtotime($value));
        if(!$date){
            return false;
        }
        return $date < \date('Y/m/d',strtotime("-18 years"));
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.minor');
    }
}
