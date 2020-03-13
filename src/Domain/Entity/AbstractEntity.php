<?php

namespace Skp\Domain\Entity;

use Skp\Domain\Exception\ValidationException;
use Skp\Domain\Validation\ValidationInterface;

abstract class AbstractEntity
{

    /**
     * Validate and call set entity data
     *
     * @param array $data
     * @param ValidationInterface $validator
     * @throws ValidationException
     */
    public function setData(array $data, ValidationInterface $validator)
    {
        if (!$validator->isValid($data)) {
            ValidationException::exception($validator);
        }

        $this->setValuesFromArray($data);
    }

    /**
     * Set entity data from array
     * @param array $data
     */
    public function setValuesFromArray(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

}