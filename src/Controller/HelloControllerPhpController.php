<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class HelloControllerPhpController extends AbstractController
{
    #[Route('/hello', name: 'app_hello')]
    // route: address of the page, name: name of the route
    // we use name instead of address

    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/HelloControllerPhpController.php',
        ]);
    }
}
