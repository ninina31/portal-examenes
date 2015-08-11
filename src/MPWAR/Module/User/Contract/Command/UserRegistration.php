<?php

namespace MPWAR\Module\User\Contract\Command;

use SimpleBus\Message\Type\Command;

final class UserRegistration implements Command
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public function email()
    {
        return $this->email;
    }

    public function password()
    {
        return $this->password;
    }

}
