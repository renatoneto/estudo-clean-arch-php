<?php

namespace Skp\Application\Repository;

use Skp\Domain\Entity\User;
use Skp\Domain\Exception\EntityNotFound;

interface UserRepositoryInterface
{

    public function createUser(User $entity);

    /**
     * @param $id
     * @return User|null
     * @throws EntityNotFound
     */
    public function getUser($id): ?User;

}