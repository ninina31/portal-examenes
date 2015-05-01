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
    private $createdAt;

    use PrivateMessageRecorderCapabilities;

    public function __construct(QuestionTypeId $id, QuestionTypeDescription $description, QuestionTypeAutocorrect $autocorrect, DateTimeImmutable $createdAt = null)
    {
        $this->id               = $id;
        $this->description      = $description;
        $this->autocorrect      = $autocorrect;
        $this->createdAt = $createdAt ?: new DateTimeImmutable();
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

    public function createdAt()
    {
        return $this->createdAt;
    }

    public static function register(QuestionTypeId $id, QuestionTypeDescription $description, QuestionTypeAutocorrect $autocorrect)
    {
        $questionType = new QuestionType($id, $description, $autocorrect);
        $questionType->record(new QuestionTypeRegistered($id->value(), $questionType->createdAt(), $autocorrect->value()));
        return $questionType;
    }
}
