<?php

namespace MPWAR\Module\Question\Contract\Response;

use DateTimeImmutable;
use MySQL\Domain\Response;

final class QuestionResponse implements Response
{
    private $description;
    private $type;
    private $examId;
    private $registrationDate;

    public function __construct($description, $type, $exam_id, DateTimeImmutable $registrationDate)
    {
        $this->description      = $description;
        $this->type             = $type;
        $this->examId           = $exam_id;
        $this->registrationDate = $registrationDate;
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
        return $this->examId;
    }

    public function registrationDate()
    {
        return $this->registrationDate;
    }
}
