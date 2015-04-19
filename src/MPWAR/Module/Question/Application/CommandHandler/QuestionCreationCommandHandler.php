<?php

namespace MPWAR\Module\Question\Application\CommandHandler;

use MPWAR\Module\Question\Application\Service\QuestionRegistrar;
use MPWAR\Module\Question\Contract\Command\QuestionRegistration;
use MPWAR\Module\Question\Contract\Exception\QuestionNotValidException;
use MPWAR\Module\Question\Domain\QuestionDescription;
use MPWAR\Module\Question\Domain\QuestionType;
use MPWAR\Module\Question\Domain\QuestionExamId;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

final class QuestionRegistrationCommandHandler implements MessageHandler
{
    private $register;

    public function __construct(Questionregister $register)
    {
        $this->register = $register;
    }
    /**
     * @param QuestionRegistration|Message $message
     *
     * @throws QuestionNotValidException
     *
     * @return void
     */
    public function handle(Message $message)
    {
        $id   = new QuestionDescription($message->description());
        $type = new QuestionType($message->type());
        $examId = new QuestionExamId($message->examId());
        $this->register->__invoke($id, $name);
    }
}
