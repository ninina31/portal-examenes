<?php

namespace MPWAR\Module\Question\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use MPWAR\Module\Question\Domain\Question;
use MPWAR\Module\Question\Domain\QuestionId;
use MPWAR\Module\Question\Domain\QuestionRepository;

final class QuestionRepositoryMySql implements QuestionRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(Question $question)
    {
        $this->entityManager->persist($question);
        $this->entityManager->flush($question);
    }

    public function search(QuestionId $id)
    {
        return $this->repository()->find($id);
    }

    private function repository()
    {
        return $this->entityManager->getRepository(Question::class);
    }
}
