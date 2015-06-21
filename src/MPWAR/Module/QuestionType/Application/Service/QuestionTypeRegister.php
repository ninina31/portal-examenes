<?php

namespace MPWAR\Module\QuestionType\Application\Service;

use iter;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use MPWAR\Module\QuestionType\Domain\QuestionType;
use MPWAR\Module\QuestionType\Domain\QuestionTypeId;
use MPWAR\Module\QuestionType\Domain\QuestionTypeDescription;
use MPWAR\Module\QuestionType\Domain\QuestionTypeAutocorrect;
use MPWAR\Module\QuestionType\Domain\QuestionTypeRepository;
use SimpleBus\Message\Bus\MessageBus;
use SimpleBus\Message\Type\Event;

final class QuestionTypeRegister
{
    private $repository;
    private $eventBus;

    public function __construct(QuestionTypeRepository $repository, MessageBus $eventBus)
    {
        $this->repository = $repository;
        $this->eventBus   = $eventBus;
    }

    public function __invoke(QuestionTypeId $id, QuestionTypeDescription $description, QuestionTypeAutocorrect $autocorrect)
    {
        // $this->guardQuestionParameters($description, $autocorrect, $exam_id);

        $questiontype = QuestionType::register($id, $description, $autocorrect);

        $this->repository->add($questiontype);

        $this->publishDomainEvents($questiontype);
    }

    // private function guardQuestionParameters(QuestionDescription $description, QuestionType $autocorrect, QuestionExamId $exam_id)
    // {
    //     $questiontype = $this->repository->search($id);

    //     if (null !== $questiontype) {
    //         throw new QuestionNotValidException($id);
    //     }
    // }

    private function publishDomainEvents(QuestionType $questiontype)
    {
        iter\apply($this->handleEvent(), $questiontype->recordedMessages());
        $questiontype->eraseMessages();
    }

    private function handleEvent()
    {
        return function (Event $event) {
            $this->eventBus->handle($event);
        };
    }
}
