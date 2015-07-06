<?php

namespace MPWAR\Module\User\Domain;

use MPWAR\Module\User\Contract\Exception\UserNotValidException;

final class UserName
{
    private $value;

    public function __construct($value)
    {
        $this->guard($value);
        
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    private function guard($value)
    {
        if (empty($value)) {
            throw new UserNotValidException($value);
        }
    }
}
