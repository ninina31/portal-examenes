<?php

namespace MPWAR\Module\User\Infrastructure\Persistence;

use Doctrine\Common\Collections\ArrayCollection;
use MPWAR\Module\User\Domain\User;
use MPWAR\Module\User\Domain\UserRepository;

final class UserRepositoryInMemory implements UserRepository
{
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function add(User $user)
    {
        $this->Users->set($user->id()->value(), $user);
    }

    public function search(UserEmail $email)
    {
        return $this->users->get($email->value());
    }
}
