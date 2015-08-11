<?php

namespace MPWAR\Api\Controller\Question;

use FOS\RestBundle\View\View;
use MPWAR\Module\QuestionType\Contract\Command\QuestionTypeRegistration;
use MPWAR\Module\QuestionType\Contract\Exception\QuestionTypeNotValidException;
use SimpleBus\Message\Bus\MessageBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

final class QuestionPostController extends Controller
{
    private $commandBus;

    public function __construct(MessageBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(Request $request)
    {
        $id            = 2;
        $description   = 'abierta_nolimit';
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

    public function getQuestionForm(Request $request)
    {

        $question_type  = new QuestionTypeRegistration(0, '', false);

        $form = $this->createFormBuilder($question_type)
            ->add('id', 'integer')
            ->add('description', 'text')
            ->add('autocorrect', 'checkbox')
            ->add('save', 'submit', array('label' => 'Agregar tipo de pregunta'))
            ->getForm();

        return $this->render('questions/insert_question.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
