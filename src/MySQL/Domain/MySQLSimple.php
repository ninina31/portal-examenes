<?php
namespace MySQL\Domain;

use MySQL\Domain\Handler\Resolver\QueryHandlerResolver;
use SimpleBus\Message\Bus;

class MySQLSimple implements MySQL
{
    private $queryHandlerResolver;
    public function __construct(QueryHandlerResolver $queryHandlerResolver)
    {
        $this->queryHandlerResolver = $queryHandlerResolver;
    }
    public function ask(Query $query)
    {
        return $this->queryHandlerResolver->resolve($query)->handle($query);
    }
}
