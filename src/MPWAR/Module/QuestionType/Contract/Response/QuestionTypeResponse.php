<?php

namespace MPWAR\Module\QuestionType\Contract\Response;

use DateTimeImmutable;
use MySQL\Domain\Response;

final class QuestionTypeResponse implements Response
{
    private $array;

    public function __construct($array)
    {
        $this->array      = $array;
    }

    public function array()
    {
        return $this->array;
    }
}
