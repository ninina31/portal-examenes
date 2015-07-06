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
     * @return Array|null
     */
    public function search();
}
