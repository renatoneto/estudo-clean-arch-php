<?php

namespace Skp\Application\Repository;

use Skp\Domain\Entity\User;

interface UserRepositoryInterface
{

    public function createUser(User $entity);

    public function getUser($id): ?User;

}