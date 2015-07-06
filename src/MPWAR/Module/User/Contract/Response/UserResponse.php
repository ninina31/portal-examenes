<?php

namespace MPWAR\Module\User\Contract\Response;

use MySQL\Domain\Response;

final class UserResponse implements Response
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
