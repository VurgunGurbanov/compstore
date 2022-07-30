<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class UcfirstRequired implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public $attr;
    public function __construct()
    {

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
        $this->attr  = $attribute;

        if($value != ucfirst($value)){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return  $this->attr. ' xanasinin  bas herfi boyuk olmalidir';
    }
}
