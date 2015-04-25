<?php

namespace MPWAR\Module\Question\Domain;

use MPWAR\Module\Question\Contract\Exception\QuestionNotValidException;

final class QuestionExamId
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
        if (empty($value) || !is_numeric($value)) {
            throw new QuestionNotValidException($value);
        }
    }
}
