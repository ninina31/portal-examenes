<?php

namespace MPWAR\Module\QuestionType\Domain;

use DateTimeImmutable;
use MPWAR\Module\QuestionType\Contract\DomainEvent\QuestionTypeRegistered;
use SimpleBus\Message\Recorder\PrivateMessageRecorderCapabilities;
use SimpleBus\Message\Recorder\RecordsMessages;

final class QuestionType implements RecordsMessages
{
    private $id;
    private $description;
    private $autocorrect;
    private $registrationDate;

    use PrivateMessageRecorderCapabilities;

    public function __construct(QuestionTypeId $id,QuestionTypeDescription $description, QuestionTypeAutocorrect $autocorrect, DateTimeImmutable $registrationDate = null)
    {
        $this->id               = $id;
        $this->description      = $description;
        $this->autocorrect      = $autocorrect;
        $this->registrationDate = $registrationDate ?: new DateTimeImmutable();
    }

    public function id()
    {
        return $this->id;
    }

    public function description()
    {
        return $this->description;
    }

    public function autocorrect()
    {
        return $this->autocorrect;
    }

    public function registrationDate()
    {
        return $this->registrationDate;
    }

    public static function register(QuestionTypeDescription $description, QuestionTypeAutocorrect $autocorrect)
    {
        $questionType = new QuestionType($description, $autocorrect);
        $questionType->record(new QuestionTypeRegistered($description->value(), $questionType->registrationDate(), $autocorrect->value()));
        return $questionType;
    }
}
