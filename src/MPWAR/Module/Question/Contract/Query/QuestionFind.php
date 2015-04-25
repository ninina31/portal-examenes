<?php

namespace MPWAR\Module\Question\Contract\Query;

use MySQL\Domain\Query;

final class QuestionFind implements Query
{
    private $questionId;

    public function __construct($questionId)
    {
        $this->questionId = $questionId;
    }
    
    public function questionId()
    {
        return $this->questionId;
    }
}
