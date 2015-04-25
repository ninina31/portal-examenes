<?php

namespace MPWAR\Module\Question\Contract\Command;

use SimpleBus\Message\Type\Command;

final class QuestionRegistration implements Command
{
    private $description;
    private $type;
    private $exam_id;

    public function __construct($description, $type, $exam_id)
    {
        $this->description   = $description;
        $this->type = $type;
        $this->exam_id = $exam_id;
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
}
