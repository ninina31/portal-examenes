<?php

namespace MySQL\Domain\Handler\Map;
use MySQL\Domain\Handler\Map\Exception\NoHandlerForQueryName;
use MySQL\Domain\Handler\QueryHandler;

interface QueryHandlerMap
{
    /**
     * @param string $queryName
     *
     * @throws NoHandlerForQueryName
     *
     * @return QueryHandler
     */
    public function handlerByQueryName($queryName);
}
