<?php

namespace MPWAR\Module\User\Application\Service;

use iter;
use MPWAR\Module\User\Contract\Exception\UserAlreadyExistsException;
use MPWAR\Module\User\Domain\User;
use MPWAR\Module\User\Domain\UserEmail;
use MPWAR\Module\User\Domain\UserPassword;
use MPWAR\Module\User\Domain\UserRepository;
use SimpleBus\Message\Bus\MessageBus;
use SimpleBus\Message\Type\Event;

final class UserRegister
{
    private $repository;
    private $eventBus;

    public function __construct(UserRepository $repository, MessageBus $eventBus)
    {
        $this->repository = $repository;
        $this->eventBus   = $eventBus;
    }

    public function __invoke(UserEmail $email, UserPassword $password)
    {
        $this->guardQuestionParameters($email);

        $user = User::register($email, $password);

        $this->repository->add($user);

        $this->publishDomainEvents($user);
    }

    private function guardQuestionParameters(UserEmail $email)
    {
        $user = $this->repository->search($email);

        if (null !== $user) {
            throw new UserAlreadyExistsException($email);
        }
    }

    private function publishDomainEvents(User $user)
    {
        iter\apply($this->handleEvent(), $user->recordedMessages());
        $user->eraseMessages();
    }

    private function handleEvent()
    {
        return function (Event $event) {
            $this->eventBus->handle($event);
        };
    }
}
