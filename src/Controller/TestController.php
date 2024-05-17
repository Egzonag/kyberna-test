<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Form\UserType;
use App\Interfaces\GreeterInterface;

class TestController extends AbstractController
{
    private $greeter;

    #[Route('/test', name: 'app_test')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Hello World!',
            'path' => 'src/Controller/TestController.php',
        ]);
    }

    #[Route('/greeter', name: 'app_greeter')]
    public function helloWorld(Request $request, GreeterInterface $greeter): Response

    {
        $userForm = $this->createForm(UserType::class);
        $userForm->handleRequest($request);
    
        $message = 'Hello World!';
    
        if ($userForm->isSubmitted() && $userForm->isValid()) {
            $data = $userForm->getData();
            $message = $greeter->greet($data['name']);
        }
    
        return $this->render('greeter/hello.html.twig', [
            'message' => $message,
            'userForm' => $userForm->createView(),
        ]);
    }
    
}
