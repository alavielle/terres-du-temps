<?php

namespace App\Controller;

use App\Repository\AgendaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Knp\Component\Pager\PaginatorInterface;

class AgendaController extends AbstractController
{
    #[Route('/agenda', name: 'agenda')]
    public function index(Request $request,
                          AgendaRepository $agendaRepository,
                          PaginatorInterface $paginator): Response
    {
        $periode = $request->query->get('periode',null);
        $key  = $request->query->get('key',null);
        $localisation  = $request->query->get('localisation',null);
        $date  = $request->query->get('date',null);
                
        $data = $agendaRepository->getSearchAgenda($periode, $key, $localisation, $date);

        $agendas = $paginator->paginate(
        $data, // Requête contenant les données à paginer (ici nos projets)
        $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
            3// Nombre de résultats par page
        );
        return $this->render('agenda/agenda.html.twig', [
            'agendas' => $agendas,
            'controller_name' => 'AgendaController',
        ]);
    }

    #[Route('/agenda/{id}', name: 'agendaDetails')]
    public function displayAgenda( AgendaRepository $agendaRepository, $id)
    {
        $agendaDetails   = $agendaRepository->findOneById($id);
        return $this->render('agenda/agendaDetails.html.twig', [
            'agendaDetails'    => $agendaDetails 
        ]);
    }
}
