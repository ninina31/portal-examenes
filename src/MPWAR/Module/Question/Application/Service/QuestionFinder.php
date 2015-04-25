<?php

namespace MPWAR\Module\Question\Application\Service;

use MPWAR\Module\Question\Contract\Exception\QuestionNotExistsException;
use MPWAR\Module\Question\Contract\Response\QuestionResponse;
use MPWAR\Module\Question\Domain\QuestionId;
use MPWAR\Module\Question\Domain\QuestionRepository;

final class QuestionFinder
{
    private $repository;

    public function __construct(QuestionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(QuestionId $id)
    {
        $question = $this->repository->search($id);

        if (null === $question) {
            throw new QuestionNotExistsException($id);
        }

        $response = new QuestionResponse($question->id()->value(), $question->name()->value(), $question->registrationDate());

        return $response;
    }
}
