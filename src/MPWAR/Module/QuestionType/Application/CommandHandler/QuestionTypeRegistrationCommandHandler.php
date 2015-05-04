<?php

namespace MPWAR\Module\QuestionType\Application\CommandHandler;

use MPWAR\Module\QuestionType\Application\Service\QuestionTypeRegister;
use MPWAR\Module\QuestionType\Contract\Command\QuestionTypeRegistration;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use MPWAR\Module\QuestionType\Domain\QuestionTypeId;
use MPWAR\Module\QuestionType\Domain\QuestionTypeDescription;
use MPWAR\Module\QuestionType\Domain\QuestionTypeAutocorrect;
use SimpleBus\Message\Handler\MessageHandler;
use SimpleBus\Message\Message;

final class QuestionTypeRegistrationCommandHandler implements MessageHandler
{
    private $register;

    public function __construct(QuestionTypeRegister $register)
    {
        $this->register = $register;
    }
    /**
     * @param QuestionTypeRegistration|Message $message
     *
     * @throws QuestionTypeNotValidException
     *
     * @return void
     */
    public function handle(Message $message)
    {
        $description = new QuestionTypeDescription($message->description());
        $autocorrect = new QuestionTypeAutocorrect($message->autocorrect());
        $this->register->__invoke($description, $autocorrect);
    }
}
