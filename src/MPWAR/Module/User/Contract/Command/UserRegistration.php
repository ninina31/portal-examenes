<?php

namespace MPWAR\Module\User\Contract\Command;

use SimpleBus\Message\Type\Command;

final class UserRegistration implements Command
{
    private $id;
    private $name;
    private $lastname;
    private $email;
    private $password;

    public function __construct($id, $name, $lastname, $email, $password)
    {
        $this->id       = $id;
        $this->name     = $name;
        $this->lastname = $lastname;
        $this->email    = $email;
        $this->password = $password;
    }

    public function id()
    {
        return $this->id;
    }

    public function name()
    {
        return $this->name;
    }

    public function lastname()
    {
        return $this->lastname;
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
