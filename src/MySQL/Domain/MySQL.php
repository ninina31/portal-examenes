<?php

namespace  MySQL\Domain;

interface  MySQL
{
    /**
     * @param Query $query
     *
     * @return Response
     */
    public function ask(Query $query);
}
