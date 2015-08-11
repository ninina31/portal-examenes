<?php

namespace MPWAR\Api\Controller\User;

use FOS\RestBundle\View\View;
use MPWAR\Module\User\Contract\Command\UserRegistration;
use MPWAR\Module\User\Contract\Exception\UserNotValidException;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UserPostController
{
    private $commandBus;

    public function __construct(MessageBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request)
    {

        $command  = new UserRegistration('email', 'password');
        $response = View::create(null, Response::HTTP_CREATED);

        try {
            $this->commandBus->handle($command);
        } catch (UserNotValidException $exception) {
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
