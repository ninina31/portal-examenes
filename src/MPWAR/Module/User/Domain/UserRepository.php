<?php

namespace MPWAR\Module\User\Domain;

interface UserRepository
{
    /**
     * @param User $user
     *
     * @return void
     */
    public function add(User $user);

    /**
     * @param UserEmail $email
     *
     * @return User|null
     */
    public function search(UserEmail $email);
}
