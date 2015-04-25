<?php

namespace MPWAR\Module\QuestionType\Application\Service;

use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotExistsException;
use MPWAR\Module\QuestionType\Contract\Response\QuestionTypeResponse;
use MPWAR\Module\QuestionType\Domain\QuestionTypeId;
use MPWAR\Module\QuestionType\Domain\QuestionTypeRepository;

final class QuestionTypeFinder
{
    private $repository;

    public function __construct(QuestionTypeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        $questionType = $this->repository->search();

        $response = new QuestionTypeResponse($questionType->array());

        return $response;
    }
}
