<?php

namespace App\Repositories;

use App\Model\User;
use Skp\Application\Repository\UserRepositoryInterface;
use Skp\Domain\Entity\User as UserEntity;

class UserRepositoryEloquent implements UserRepositoryInterface
{

    public function createUser(UserEntity $entity)
    {
        $user = new User();
        $user->name = $entity->getName();
        $user->email = $entity->getEmail();
        $user->save();

        $entity->setValuesFromArray($user->toArray());
    }

    /**
     * @inheritDoc
     */
    public function getUser($id): ?UserEntity
    {
        $user = User::find($id);

        if ($user) {
            $entity = new UserEntity();
            $entity->setValuesFromArray($user->toArray());
            return $entity;
        }

        return null;
    }

}