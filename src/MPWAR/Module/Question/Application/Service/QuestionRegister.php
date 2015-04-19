<?php

namespace MPWAR\Module\Question\Application\Service;

use iter;
use MPWAR\Module\Question\Contract\Exception\QuestionNotValidException;
use MPWAR\Module\Question\Domain\Question;
use MPWAR\Module\Question\Domain\QuestionDescription;
use MPWAR\Module\Question\Domain\QuestionType;
use MPWAR\Module\Question\Domain\QuestionExamId;
use MPWAR\Module\Question\Domain\QuestionRepository;
use SimpleBus\Message\Bus\MessageBus;
use SimpleBus\Message\Type\Event;

final class QuestionRegister
{
    private $repository;
    private $eventBus;

    public function __construct(QuestionRepository $repository, MessageBus $eventBus)
    {
        $this->repository = $repository;
        $this->eventBus   = $eventBus;
    }

    public function __invoke(QuestionDescription $description, QuestionType $type, QuestionExamId $exam_id)
    {
        // $this->guardQuestionParameters($description, $type, $exam_id);

        $question = Question::register($description, $type, $exam_id);

        $this->repository->add($question);

        $this->publishDomainEvents($question);
    }

    // private function guardQuestionParameters(QuestionDescription $description, QuestionType $type, QuestionExamId $exam_id)
    // {
    //     $question = $this->repository->search($id);

    //     if (null !== $question) {
    //         throw new QuestionNotValidException($id);
    //     }
    // }

    private function publishDomainEvents(Question $question)
    {
        iter\apply($this->handleEvent(), $question->recordedMessages());
        $question->eraseMessages();
    }

    private function handleEvent()
    {
        return function (Event $event) {
            $this->eventBus->handle($event);
        };
    }
}
