<?php

namespace MPWAR\Api\Controller\Question;

use FOS\RestBundle\View\View;
use MPWAR\Module\QuestionType\Contract\Command\QuestionTypeRegistration;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class QuestionPostController
{
    private $commandBus;

    public function __construct(MessageBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request)
    {
        $id            = 1;
        $description   = 'seleccion_simple';
        $autocorrect   = true;

        $command  = new QuestionTypeRegistration($id, $description, $autocorrect);
        $response = View::create(null, Response::HTTP_CREATED);

        try {
            $this->commandBus->handle($command);
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
