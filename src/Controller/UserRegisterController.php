<?php

namespace App\Controller;

use App\Message\UserRegistered;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\HandleTrait;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserRegisterController extends AbstractController
{

    use HandleTrait;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    #[Route('/', name: 'app_user_register', methods: ['POST'])]
    public function index(Request $request, MessageBusInterface $messageBus): JsonResponse
    {

        $response = $messageBus->dispatch(new UserRegistered($request->request->get('username')));

        return $this->json([
            'response' => $response,
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/UserRegisterController.php',
        ]);
    }
}
