<?php

namespace App\Controller\Admin;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/adm', name: 'admin_users_')]
class UsersController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(UserRepository $usersRepository): Response
    {
        return $this->render('admin/users/index.html.twig', [
            'user' => $usersRepository->findBy([], ['firstname' => 'asc'])
        ]);
    }
}
