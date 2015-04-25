<?php

namespace MPWAR\Module\Question\Contract\Exception;

use InvalidArgumentException;

final class QuestionNotExistsException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(sprintf('Question id: <%s> doesnt exists', $value));
        $this->code = 'question_no_exists';
    }
}
