<?php

namespace MPWAR\Module\QuestionType\Domain;

use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;

final class QuestionTypeId
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

    public function __toString()
    {
        return $this->value();
    }

    private function guard($value)
    {
        if (empty($value) || !is_numeric($value)) {
            throw new QuestionTypeNotValidException($value);
        }
    }
}
