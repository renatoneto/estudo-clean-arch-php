<?php


namespace App\Validation;

use Illuminate\Contracts\Validation\Validator;
use Skp\Domain\Validation\UserValidationInterface;

class UserValidation implements UserValidationInterface
{

    /**
     * @var Validator
     */
    private Validator $validator;

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