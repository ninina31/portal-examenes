<?php

namespace MySQL\Domain\Handler\Resolver;

use MySQL\Domain\Handler\QueryHandler;
use MySQL\Domain\Query;

interface QueryHandlerResolver
{
    /**
     * Resolve the QueryHandler for the given Query.
     *
     * @param Query $query
     *
     * @return QueryHandler
     */
    public function resolve(Query $query);
}
