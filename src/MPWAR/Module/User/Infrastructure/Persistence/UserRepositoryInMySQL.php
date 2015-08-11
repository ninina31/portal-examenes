<?php

namespace MPWAR\Module\User\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use MPWAR\Module\User\Domain\User;
use MPWAR\Module\User\Domain\UserEmail;
use MPWAR\Module\User\Domain\UserRepository;

final class UserRepositoryInMySQL implements UserRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(User $user)
    {
        $this->entityManager->persist($user);
        $this->entityManager->flush($user);
    }

    public function search(UserEmail $email)
    {
        return $this->repository()->findOneBy(array('email' => $email));
    }

    private function repository()
    {
        return $this->entityManager->getRepository(User::class);
    }
}
