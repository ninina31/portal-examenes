<?php

namespace MPWAR\Module\User\Application\Service;

use MPWAR\Module\User\Contract\Exception\UserNotExistsException;
use MPWAR\Module\User\Contract\Response\UserResponse;
use MPWAR\Module\User\Domain\UserRepository;

final class UserFinder
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $user = $this->repository->search();

        $response = new UserResponse($user);

        return $response;
    }
}
