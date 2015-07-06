<?php

namespace MPWAR\Module\User\Application\QueryHandler;

use MPWAR\Module\User\Application\Service\UserFinder;
use MPWAR\Module\User\Contract\Exception\UserNotValidException;
use MPWAR\Module\User\Contract\Query\UserFind;
use MPWAR\Module\User\Contract\Response\UserResponse;
use MySQL\Domain\Handler\QueryHandler;
use MySQL\Domain\Query;

final class UserFindQueryHandler implements QueryHandler
{
    private $finder;
    public function __construct(UserFinder $finder)
    {
        $this->finder = $finder;
    }
    /**
     * @param UserFind|Query $query
     *
     * @throws UserNotValidException
     *
     * @return UserResponse
     */
    public function handle(Query $query)
    {
        return $this->finder->__invoke();
    }
}
