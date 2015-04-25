<?php

namespace MySQL\Domain\Name;

use MySQL\Domain\Query;

class ClassBasedNameResolver implements QueryNameResolver
{
    public function resolve(Query $query)
    {
        return get_class($query);
    }
}
