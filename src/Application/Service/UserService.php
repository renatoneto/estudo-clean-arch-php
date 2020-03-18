<?php

namespace Skp\Application\Service;

use Skp\Application\Repository\UserRepositoryInterface;
use Skp\Domain\Entity\User;
use Skp\Domain\Exception\EntityNotFound;
use Skp\Domain\Exception\ValidationException;
use Skp\Domain\Validation\UserValidationInterface;

class UserService
{

    private UserRepositoryInterface $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param array $data
     * @param UserValidationInterface $validation
     * @return User
     * @throws ValidationException
     */
    public function createUser(array $data, UserValidationInterface $validation)
    {
        $user = new User();
        $user->setValidator($validation);
        $user->setData($data);

        $this->userRepository->createUser($user);

        return $user;
    }

    /**
     * @param $id
     * @return User
     * @throws EntityNotFound
     */
    public function getUser($id): User
    {
        return $this->userRepository->getUser($id);
    }

}