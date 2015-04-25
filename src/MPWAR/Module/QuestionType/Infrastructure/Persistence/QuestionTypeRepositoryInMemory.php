<?php

namespace MPWAR\Module\QuestionType\Infrastructure\Persistence;

use Doctrine\Common\Collections\ArrayCollection;
use MPWAR\Module\QuestionType\Domain\QuestionType;
use MPWAR\Module\QuestionType\Domain\QuestionTypeRepository;

final class QuestionTypeRepositoryInMemory implements QuestionTypeRepository
{
    private $questiontypes;

    public function __construct()
    {
        $this->questiontypes = new ArrayCollection();
    }

    public function add(QuestionType $questiontype)
    {
        $this->questiontypes->set($questiontype->id()->value(), $questiontype);
    }

    public function search()
    {
        return $this->questiontypes;
    }
}
