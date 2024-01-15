<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'main')]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'user' => $userRepository->findBy([], ['firstname' => 'asc'])
        ]);
    }
}
