<?php

namespace MPWAR\Module\Question\Application\QueryHandler;

use MPWAR\Module\Question\Application\Service\QuestionFinder;
use MPWAR\Module\Question\Contract\Exception\QuestionNotValidException;
use MPWAR\Module\Question\Contract\Query\QuestionFind;
use MPWAR\Module\Question\Contract\Response\QuestionResponse;
use MPWAR\Module\Question\Domain\QuestionId;
use MySQL\Domain\Handler\QueryHandler;
use MySQL\Domain\Query;

final class QuestionFindQueryHandler implements QueryHandler
{
    private $finder;
    public function __construct(QuestionFinder $finder)
    {
        $this->finder = $finder;
    }
    /**
     * @param QuestionFind|Query $query
     *
     * @throws QuestionNotValidException
     *
     * @return QuestionResponse
     */
    public function handle(Query $query)
    {
        $id = new QuestionId($query->questionId());
        return $this->finder->__invoke($id);
    }
}
