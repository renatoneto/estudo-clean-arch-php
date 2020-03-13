<?php

namespace Skp\Domain\Exception;

use Skp\Domain\Validation\ValidationInterface;

class ValidationException extends \Exception
{

    /**
     * @var array
     */
    protected array $errors = [];

    /**
     * Dispatch new exception based on validation
     * @param ValidationInterface $validator
     * @throws ValidationException
     */
    public static function exception(ValidationInterface $validator)
    {
        $e = new self('Validation error');
        $e->setErrors($validator->getErrors());

        throw $e;
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param array $errors
     */
    public function setErrors(array $errors): void
    {
        $this->errors = $errors;
    }

}