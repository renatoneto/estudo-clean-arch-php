<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Skp\Application\Repository\UserRepositoryInterface;

class User extends Model implements UserRepositoryInterface
{

    public function createUser(\Skp\Domain\Entity\User $entity)
    {
        $user = new User();
        $user->name = $entity->getName();
        $user->email = $entity->getEmail();
        $user->save();

        $entity->setValuesFromArray($user->toArray());
    }

    public function getUser($id): ?\Skp\Domain\Entity\User
    {
        $user = $this->find($id);

        if ($user) {
            $entity = new \Skp\Domain\Entity\User();
            $entity->setValuesFromArray($user->toArray());
            return $entity;
        }

        return null;
    }

}