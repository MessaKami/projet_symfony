<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil', name: 'profile_')]
class ProfileController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'Profil de l\'utilisateur ',
        ]);
    }

    #[Route('/penality', name: 'penality')]
    public function penality(): Response
    {
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'Penality de l\'utilisateur ',
        ]);
    }
}
