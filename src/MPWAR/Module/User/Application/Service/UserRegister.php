<?php

namespace MPWAR\Module\User\Application\Service;

use iter;
use MPWAR\Module\User\Contract\Exception\UserNotValidException;
use MPWAR\Module\User\Domain\User;
use MPWAR\Module\User\Domain\UserId;
use MPWAR\Module\User\Domain\UserName;
use MPWAR\Module\User\Domain\UserLastName;
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

    public function __invoke(UserId $id, UserName $name, UserLastName $lastname, UserEmail $email, UserPassword $password)
    {
        // $this->guardQuestionParameters($description, $autocorrect, $exam_id);

        $user = User::register($id, $name, $lastname, $email, $password);

        $this->repository->add($user);

        $this->publishDomainEvents($user);
    }

    // private function guardQuestionParameters(QuestionDescription $description, User $autocorrect, QuestionExamId $exam_id)
    // {
    //     $user = $this->repository->search($id);

    //     if (null !== $user) {
    //         throw new QuestionNotValidException($id);
    //     }
    // }

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
