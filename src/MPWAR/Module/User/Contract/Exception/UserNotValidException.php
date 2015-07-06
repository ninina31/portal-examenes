<?php

namespace MPWAR\Module\User\Contract\Exception;

use InvalidArgumentException;

final class UserNotValidException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid User value <%s>', $value));
        $this->code = 'user_not_valid';
    }
}
