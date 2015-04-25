<?php

namespace MPWAR\Module\QuestionType\Contract\Exception;

use InvalidArgumentException;

final class QuestionTypeNotValidException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(sprintf('Invalid QuestionType value <%s>', $value));
        $this->code = 'questiontype_not_valid';
    }
}
