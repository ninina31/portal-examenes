<?php

namespace MPWAR\Module\QuestionType\Contract\Response;

use MySQL\Domain\Response;

final class QuestionTypeResponse implements Response
{
    private $result;

    public function __construct($result)
    {
        $this->result      = $result;
    }

    public function result()
    {
        return $this->result;
    }
}
