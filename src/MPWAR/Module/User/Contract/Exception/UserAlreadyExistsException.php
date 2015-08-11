<?php

namespace MPWAR\Module\User\Contract\Exception;

use InvalidArgumentException;

final class UserAlreadyExistsException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(sprintf('User with email <%s> already exists', $value));
        $this->code = 'user_already_exists';
    }
}
