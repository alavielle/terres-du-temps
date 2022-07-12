<?php

namespace App\Controller;

use App\Repository\ActuRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class ActuController extends AbstractController
{
    #[Route('/actu', name: 'actu')]
    public function index(Request $request, 
                          ActuRepository $actuRepository, 
                          PaginatorInterface $paginator): Response
    {
        $periode = $request->query->get('periode',null);
        $key = $request->query->get('key',null);
        
        $data = $actuRepository->getSearchActu($periode, $key);
        $actus = $paginator->paginate(
            $data, // Requête contenant les données à paginer (ici nos projets)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3// Nombre de résultats par page
        );

        return $this->render('actu/actus.html.twig', [
            'actus' => $actus,
            'controller_name' => 'ActuController',
        ]);
    }

    #[Route('/actu/{id}', name: 'actuDetails')]
    public function displayActu( ActuRepository $actuRepository, $id)
    {
        $actuDetails = $actuRepository->findOneById($id);
        return $this->render('actu/actu.html.twig', [
            'actuDetails'    => $actuDetails 
        ]);
    }
}
