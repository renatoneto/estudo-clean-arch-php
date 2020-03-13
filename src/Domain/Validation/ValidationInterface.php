<?php

namespace Skp\Domain\Validation;

interface ValidationInterface
{

    public function isValid(array $data): bool;

    public function getErrors(): array ;

}