<?php

namespace MPWAR\Module\QuestionType\Contract\Command;

use SimpleBus\Message\Type\Command;

final class QuestionTypeRegistration implements Command
{
    private $id;
    private $description;
    private $autocorrect;

    public function __construct($id, $description, $autocorrect)
    {
        $this->id          = $id;
        $this->description = $description;
        $this->autocorrect = $autocorrect;
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
}
