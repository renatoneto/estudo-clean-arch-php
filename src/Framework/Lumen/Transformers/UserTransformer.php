<?php

namespace App\Transformers;

use Skp\Domain\Entity\User;

class UserTransformer extends AbstractTransformer
{

    public function transform(User $entity)
    {
        return [
            'id'         => $entity->getId(),
            'name'       => $entity->getName(),
            'email'      => $entity->getEmail(),
            'created_at' => $entity->getCreatedAt(),
            'updated_at' => $entity->getUpdatedAt(),
        ];
    }

}