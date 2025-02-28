<?php

namespace http\forms;

use core\Validator;
use core\ValidationException;

class LoginForm
{
    protected $errors = [];

    public function __construct(public array $attributes) //public array make it excicable to all over
    {
        //validate the form inputs
        if (!Validator::email($attributes['email'])) {
            $this->errors['email'] = "Please provide a valid email address.";
        }

        if (!Validator::string_check($attributes['password'], 1, 10)) {
            $this->errors['password'] = "Please provide a valid password.";
        }
    }
    public  static function validate($attributes)
    {
        $instance = new static($attributes);

        return $instance->failed() ? $instance->throw() : $instance;
    }

    public function throw()
    {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    public function failed()
    {
        return count($this->errors);
    }
    public function errors()
    {
        return $this->errors;
    }

    public function error($field, $message)
    {
        $this->errors[$field] = $message;

        return $this;
    }
}
