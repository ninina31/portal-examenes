<?php

namespace MPWAR\Module\QuestionType\Application\QueryHandler;

use MPWAR\Module\QuestionType\Application\Service\QuestionTypeFinder;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use MPWAR\Module\QuestionType\Contract\Query\QuestionTypeFind;
use MPWAR\Module\QuestionType\Contract\Response\QuestionTypeResponse;
use Oracle\Domain\Handler\QueryHandler;
use Oracle\Domain\Query;

final class QuestionTypeFindQueryHandler implements QueryHandler
{
    private $finder;
    public function __construct(QuestionTypeFinder $finder)
    {
        $this->finder = $finder;
    }
    /**
     * @param QuestionTypeFind|Query $query
     *
     * @throws QuestionTypeNotValidException
     *
     * @return QuestionTypeResponse
     */
    public function handle(Query $query)
    {
        return $this->finder->__invoke();
    }
}
