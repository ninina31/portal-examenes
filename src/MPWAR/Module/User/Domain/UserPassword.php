<?php

namespace MPWAR\Module\User\Domain;

use MPWAR\Module\User\Contract\Exception\UserNotValidException;

final class UserPassword
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

    public function __toString()
    {
        return $this->value();
    }

    private function guard($value)
    {
        if (empty($value) || strlen($value) < 8) {
            throw new UserNotValidException($value);
        }
    }
}
