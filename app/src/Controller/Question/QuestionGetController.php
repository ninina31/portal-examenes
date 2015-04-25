<?php

namespace MPWAR\Api\Controller\QuestionType;

use FOS\RestBundle\View\View;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use MPWAR\Module\QuestionType\Contract\Query\QuestionTypeFind;
use MySQL\Domain\MySQL;
use Symfony\Component\HttpFoundation\Response;

final class QuestionTypeGetController
{
    private $mysql;

    public function __construct(MySQL $mysql)
    {
        $this->mysql = $mysql;
    }

    public function __invoke($playerId)
    {
        $query = new QuestionTypeFind();

        try {
            $response = $this->mysql->ask($query);
        } catch (QuestionTypeNotValidException $exception) {
            $response = View::create(
                [
                    'code'    => $exception->getCode(),
                    'message' => $exception->getMessage(),
                ],
                Response::HTTP_BAD_REQUEST
            );
        }

        return $response;
    }
}
