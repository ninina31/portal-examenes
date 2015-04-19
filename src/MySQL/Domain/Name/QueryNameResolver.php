<?php

namespace MySQL\Domain\Name;

use MySQL\Domain\Query;

interface QueryNameResolver
{
    /**
     * Resolve the unique name of a query, e.g. the full class name
     *
     * @param Query $query
     *
     * @return string
     */
    public function resolve(Query $query);
}
