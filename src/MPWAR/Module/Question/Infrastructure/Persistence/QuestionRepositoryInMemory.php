<?php

namespace MPWAR\Module\Question\Infrastructure\Persistence;

use Doctrine\Common\Collections\ArrayCollection;
use MPWAR\Module\Question\Domain\Question;
use MPWAR\Module\Question\Domain\QuestionId;
use MPWAR\Module\Question\Domain\QuestionRepository;

final class QuestionRepositoryInMemory implements QuestionRepository
{
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

    public function add(Question $question)
    {
        $this->questions->set($question->id()->value(), $question);
    }

    public function search(QuestionId $id)
    {
        return $this->questions->get($id->value());
    }
}
