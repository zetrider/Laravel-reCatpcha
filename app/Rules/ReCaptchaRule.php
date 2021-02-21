<?php

namespace App\Rules;

use App\Actions\ReCaptchaAction;
use Illuminate\Contracts\Validation\Rule;

class ReCaptchaRule implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $success = false;
        $verify = (new ReCaptchaAction())->verify($value);

        if (array_key_exists('success', $verify)) {
            $success = $verify['success'];
        }

        return $success;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('Проверка reCaptcha прошла с ошибкой.');
    }
}
