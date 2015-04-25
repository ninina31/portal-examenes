<?php

namespace MPWAR\Module\QuestionType\Domain;

interface QuestionTypeRepository
{
    /**
     * @param QuestionType $questionType
     *
     * @return void
     */
    public function add(QuestionType $questionType);

    /**
     * @return Array|null
     */
    public function search();
}
