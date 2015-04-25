<?php

namespace MPWAR\Module\Question\Contract\Exception;

use InvalidArgumentException;

final class QuestionNotValidException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid Question value <%s>', $value));
        $this->code = 'question_not_valid';
    }
}
