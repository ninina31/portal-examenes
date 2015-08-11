<?php

namespace MPWAR\Module\QuestionType\Domain;

use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeValueEmptyException;

final class QuestionTypeAutocorrect
{
    private $value;

    public function __construct($value)
    {
        $this->guard($value);
        
        $this->value = $value;
    }

    public function value()
    {
        return $this->value;
    }

    private function guard($value)
    {
        if (!is_bool($value)) {
            throw new QuestionTypeNotValidException($value);
        }
    }
}
