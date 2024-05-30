<?php

namespace Validator;

class Validator
{
    public static function InputValidator(array $inputs)
    {
        foreach ($inputs as $key => $value)
        {
            if (empty($value) || !is_string($value))
            {
                return false;
            }
        }
        return true;
    }

    public static function EmailValidator($input)
    {
        if (!filter_var($input, FILTER_VALIDATE_EMAIL))
        {
            return false;
        }
        return true;
    }

    public static function PasswordValidator($input)
    {
        if (strlen($input) >= 8)
        {
            return true;
        }
        return false;
    }

    public static function ValidateConfirmPassword($password, $confirmPassword)
    {
        if($password === $confirmPassword)
        {
            return true;
        }
        return false;
    }
}