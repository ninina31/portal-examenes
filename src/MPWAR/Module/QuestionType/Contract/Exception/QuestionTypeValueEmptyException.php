<?php

namespace MPWAR\Module\QuestionType\Contract\Exception;

use InvalidArgumentException;

final class QuestionTypeValueEmptyException extends InvalidArgumentException
{
    public function __construct($value)
    {
        parent::__construct(sprintf('Empty value <%s>', $value));
        $this->code = 'questiontype_not_valid';
    }
}
