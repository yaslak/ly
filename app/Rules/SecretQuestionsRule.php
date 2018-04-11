<?php

namespace App\Rules;

use App\Model\Recover;
use App\Model\Secret_question;
use Illuminate\Contracts\Validation\Rule;

class SecretQuestionsRule implements Rule
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
        return Secret_question::where('id',$value)->first();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return trans('validation.regex',['attribute'=>'Question']);
    }
}
