<?php

namespace MPWAR\Module\QuestionType\Contract\Command;

use SimpleBus\Message\Type\Command;

final class QuestionTypeRegistration implements Command
{
    private $description;
    private $autocorrect;

    public function __construct($description, $autocorrect)
    {
        $this->description   = $description;
        $this->autocorrect = $autocorrect;
    }

    public function description()
    {
        return $this->description;
    }

    public function autocorrect()
    {
        return $this->autocorrect;
    }
}
