<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class UsersController extends AbstractController
{
    #[Route('/users', name: 'users')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {
       
        return $this->render('admin/users.html.twig', [
            'controller_name' => 'UsersController',
        ]);
    }
}
