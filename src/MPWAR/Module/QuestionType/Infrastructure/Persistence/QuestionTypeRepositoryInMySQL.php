<?php

namespace MPWAR\Module\QuestionType\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use MPWAR\Module\QuestionType\Domain\QuestionType;
use MPWAR\Module\QuestionType\Domain\QuestionTypeRepository;

final class QuestionTypeRepositoryInMySQL implements QuestionTypeRepository
{
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function add(QuestionType $questiontype)
    {
        $this->entityManager->persist($questiontype);
        $this->entityManager->flush($questiontype);
    }

    public function search()
    {
        return $this->repository()->findAll();
    }

    private function repository()
    {
        return $this->entityManager->getRepository(QuestionType::class);
    }
}
