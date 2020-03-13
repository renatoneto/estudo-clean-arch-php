<?php


namespace App\Validation;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Validator as LaravelValidator;
use Skp\Domain\Validation\UserValidationInterface;

class UserValidation implements UserValidationInterface
{

    /**
     * @var LaravelValidator
     */
    private LaravelValidator $validator;

    public function __construct()
    {
        $this->validator = Validator::make([], [
            'name' => 'required',
            'email' => 'required',
        ]);
    }

    public function isValid(array $data): bool
    {


        return $this->validator->setData($data)->passes();
    }

    public function getErrors(): array
    {
        return $this->validator->getMessageBag()->messages();
    }

}