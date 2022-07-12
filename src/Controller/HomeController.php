<?php

namespace App\Controller;

use App\Repository\AnnuaireRepository;
use App\Repository\AgendaRepository;
use App\Repository\ActuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(Request $request, EntityManagerInterface $em, 
                          AnnuaireRepository $annuaireRepository,
                          AgendaRepository $agendaRepository,
                          ActuRepository $actuRepository): Response
    {
        $homeAnnuaire   = $annuaireRepository->findOneByIsHomePage();
        $homeAgenda     = $agendaRepository->findOneByIsHomePage();
        $homeActu       = $actuRepository->findOneByIsHomePage();

        return $this->render('home/index.html.twig', [
            'homeAnnuaire'    => $homeAnnuaire,
            'homeAgenda'      => $homeAgenda,
            'homeActu'        => $homeActu,
            'controller_name' => 'HomeController',
        ]);
    }
}
