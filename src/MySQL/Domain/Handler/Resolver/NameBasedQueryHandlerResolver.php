<?php

namespace MySQL\Domain\Handler\Resolver;

use MySQL\Domain\Handler\Map\QueryHandlerMap;
use MySQL\Domain\Name\QueryNameResolver;
use MySQL\Domain\Query;

class NameBasedQueryHandlerResolver implements QueryHandlerResolver
{
    private $queryNameResolver;
    private $queryHandlers;

    public function __construct(QueryNameResolver $queryNameResolver, QueryHandlerMap $queryHandlers)
    {
        $this->queryNameResolver = $queryNameResolver;
        $this->queryHandlers     = $queryHandlers;
    }
    
    public function resolve(Query $query)
    {
        $name = $this->queryNameResolver->resolve($query);
        return $this->queryHandlers->handlerByQueryName($name);
    }
}
