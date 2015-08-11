<?php

namespace MPWAR\Module\QuestionType\Domain;

use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeValueEmptyException;

final class QuestionTypeDescription
{
    private static $allowed = ['abierta_nolimit', 'abierta_limit', 'seleccion_simple', 'seleccion_multple'];
    private $value;

    public function __construct($value)
    {
        $this->guard($value);
        $this->value = $value;
    }

    public static function abierta_nolimit()
    {
        return new self('abierta_nolimit');
    }

    public static function abierta_limit()
    {
        return new self('abierta_limit');
    }

    public static function seleccion_simple()
    {
        return new self('seleccion_simple');
    }

    public static function seleccion_multiple()
    {
        return new self('seleccion_multiple');
    }

    public function __toString()
    {
        return $this->value();
    }

    public function value()
    {
        return $this->value;
    }

    private function guard($value)
    {
        if (empty($value)) {
            throw new QuestionTypeValueEmptyException($value);
        }

        if (!in_array($value, self::$allowed)) {
            throw new QuestionTypeNotValidException($value);
        }
    }
}
