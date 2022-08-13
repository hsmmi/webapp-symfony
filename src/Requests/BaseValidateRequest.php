<?php

namespace App\Requests;

abstract class BaseValidateRequest
{
    // constroctor
    public function __construct(array $fields, ValidatorInterface $validator)
    {
        // dd($fields);
        foreach ($fields as $field => $value) {
            if (property_exists($this, $field)) { // check if exist in class
                $this->{$field} = $value; // {} beacuse it's variable
            }
            // property_exists($this, $field) ? $this->$field = $value : null;
        }

        $this->validator = $validator;
    }

    private function validate(ValidatorInterface $validator): void
    {
        $error = $validator->validate($this);
        
        // you should handle exeptoin
        if ($errors->count()) {
            throw new Exception();
        }
    }

    abstract function init(): void; // to be sure child class will implement it

}  