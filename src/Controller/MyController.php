<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Service\MyService;

class MyController extends AbstractController
{
    #[Route('/my', name: 'app_my')]
    public function index(MyService $myService): Response
    {
        $message = $myService->doSomething('hello world');

        return $this->render('my/index.html.twig', [
            'message' => $message,
        ]);
    }
}
