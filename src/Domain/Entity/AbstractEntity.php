<?php

namespace Skp\Domain\Entity;

use Skp\Domain\Exception\ValidationException;
use Skp\Domain\Validation\ValidationInterface;

abstract class AbstractEntity
{

    protected ValidationInterface $validator;

    /**
     * @param ValidationInterface $validator
     */
    public function setValidator(ValidationInterface $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Validate and call set entity data
     *
     * @param array $data
     * @throws ValidationException
     */
    public function setData(array $data)
    {
        if ($this->validator && !$this->validator->isValid($data)) {
            ValidationException::exception($this->validator);
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