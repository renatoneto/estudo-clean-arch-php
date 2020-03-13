<?php

namespace Skp\Application\Service;

use Skp\Application\Repository\UserRepositoryInterface;
use Skp\Domain\Entity\User;
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
        $user->setData($data, $validation);

        $this->userRepository->createUser($user);

        return $user;
    }

    /**
     * @param $id
     * @return User
     * @throws \Exception
     */
    public function getUser($id): User
    {
        if (!$user = $this->userRepository->getUser($id)) {
            throw new \Exception('User not found');
        }

        return $user;
    }

}