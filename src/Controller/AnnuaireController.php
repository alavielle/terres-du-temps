<?php

namespace App\Controller;
use App\Repository\AnnuaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class AnnuaireController extends AbstractController
{
    #[Route('/annuaire', name: 'annuaire')]
    public function index(Request $request, 
                          AnnuaireRepository $annuaireRepository,
                          PaginatorInterface $paginator): Response
    {
        $data    = $annuaireRepository->findAll();

        $annuaires = $paginator->paginate(
            $data, // Requête contenant les données à paginer (ici nos projets)
            $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3// Nombre de résultats par page
        );
        return $this->render('annuaire/annuaire.html.twig', [
            'annuaires' => $annuaires,
            'controller_name' => 'AnnuaireController',
        ]);
    }

    #[Route('/annuaire/{id}', name: 'annuaireDetails')]
    public function displayAnnuaire( AnnuaireRepository $annuaireRepository, $id)
    {
        $annuaireDetails   = $annuaireRepository->findOneById($id);
        return $this->render('annuaire/annuaireDetails.html.twig', [
            'annuaireDetails'    => $annuaireDetails 
        ]);
    }
}
