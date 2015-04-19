<?php

namespace MPWAR\Module\Question\Domain;

interface QuestionRepository
{
    /**
     * @param Question $question
     *
     * @return void
     */
    public function add(Question $question);

    /**
     * @param QuestionId $id
     *
     * @return Question|null
     */
    public function search(QuestionId $id);
}
