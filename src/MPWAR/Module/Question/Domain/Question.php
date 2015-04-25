<?php

namespace MPWAR\Module\Question\Domain;

use DateTimeImmutable;
use MPWAR\Module\Question\Contract\DomainEvent\QuestionRegistered;
use SimpleBus\Message\Recorder\PrivateMessageRecorderCapabilities;
use SimpleBus\Message\Recorder\RecordsMessages;

final class Question implements RecordsMessages
{
    private $description;
    private $type;
    private $exam_id;
    private $createdAt;

    use PrivateMessageRecorderCapabilities;

    public function __construct(QuestionDescription $description, QuestionType $type, QuestionExamId $exam_id, DateTimeImmutable $createdAt = null)
    {
        $this->description      = $description;
        $this->type             = $type;
        $this->exam_id          = $exam_id;
        $this->createdAt = $createdAt ?: new DateTimeImmutable();
    }

    public function description()
    {
        return $this->description;
    }

    public function type()
    {
        return $this->type;
    }

    public function examId()
    {
        return $this->exam_id;
    }

    public function createdAt()
    {
        return $this->createdAt;
    }

    public static function register(QuestionDescription $description, QuestionType $type,QuestionExamId $exam_id)
    {
        $question = new Question($description, $type, $exam_id);
        $question->record(new QuestionRegistered($description->value(), $question->createdAt(), $type->value()));
        return $question;
    }
}
