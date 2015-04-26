<?php

namespace MySQL\Domain\Handler;

use MySQL\Domain\Query;
use MySQL\Domain\Response;

interface QueryHandler
{
    /**
     * Handles the given query.
     *
     * @param Query $query
     *
     * @return Response
     */
    public function handle(Query $query);
}
