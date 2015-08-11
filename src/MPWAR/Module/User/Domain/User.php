<?php

namespace MPWAR\Module\User\Domain;

use DateTimeImmutable;
use MPWAR\Module\User\Contract\DomainEvent\UserRegistered;
use SimpleBus\Message\Recorder\PrivateMessageRecorderCapabilities;
use SimpleBus\Message\Recorder\RecordsMessages;

final class User implements RecordsMessages
{
    private $id;
    private $email;
    private $password;
    private $registrationDate;

    use PrivateMessageRecorderCapabilities;

    public function __construct(UserId $id, UserEmail $email, UserPassword $password, DateTimeImmutable $registrationDate = null)
    {
        $this->id               = $id;
        $this->email            = $email;
        $this->password         = $password;
        $this->registrationDate = $registrationDate ?: new DateTimeImmutable();
    }

    public function id()
    {
        return $this->id;
    }

    public function email()
    {
        return $this->email;
    }

    public function password()
    {
        return $this->password;
    }

    public function registrationDate()
    {
        return $this->registrationDate;
    }

    public static function register(UserId $id, UserEmail $email, UserPassword $password)
    {
        $user = new User($id, $email, $password);
        $user->record(new UserRegistered($user->registrationDate(), $email->value()));
        return $user;
    }
}
