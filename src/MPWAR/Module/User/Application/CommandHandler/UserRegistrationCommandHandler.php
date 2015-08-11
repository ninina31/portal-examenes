<?php

namespace MPWAR\Module\User\Application\CommandHandler;

use MPWAR\Module\User\Application\Service\UserRegister;
use MPWAR\Module\User\Contract\Command\UserRegistration;
use MPWAR\Module\User\Contract\Exception\UserNotValidException;
use MPWAR\Module\User\Domain\UserEmail;
use MPWAR\Module\User\Domain\UserPassword;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

final class UserRegistrationCommandHandler implements MessageHandler
{
    private $register;

    public function __construct(UserRegister $register)
    {
        $this->register = $register;
    }
    /**
     * @param UserRegistration|Message $message
     *
     * @throws UserNotValidException
     *
     * @return void
     */
    public function handle(Message $message)
    {
        $email = new UserEmail($message->email());
        $password = new UserPassword($message->password());
        $this->register->__invoke($email, $password);
    }
}
