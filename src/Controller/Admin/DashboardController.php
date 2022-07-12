<?php

namespace App\Controller\Admin;
use App\Entity\User;
use App\Entity\Actu;
use App\Entity\Annuaire;
use App\Entity\Agenda;
use App\Entity\Periode;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    public function __construct(private AdminUrlGenerator $adminUrlGenerator) {

    }
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
            ->setController(UserCrudController::class)
            ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('')
            ->setTitle('<img src="img/LogoNico.jpg" style=\'width: 20%;\'> Terres du temps BackOffice')
            ;
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToCrud('Gestion utilisateurs', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Périodes', 'fas fa-stopwatch', Periode::class);
        yield MenuItem::linkToCrud('Actualités', 'far fa-newspaper', Actu::class);
        yield MenuItem::linkToCrud('Agenda', 'fas fa-calendar-week', Agenda::class);
        yield MenuItem::linkToCrud('Annuaire', 'fas fa-phone', Annuaire::class);
        yield MenuItem::linkToCrud('Statistiques', 'fas fa-sort-numeric-up-alt', User::class);

    }
}
