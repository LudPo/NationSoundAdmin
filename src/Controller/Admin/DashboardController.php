<?php

namespace App\Controller\Admin;

use App\Entity\Artist;
use App\Entity\Event;
use App\Entity\User;
use App\Entity\LocationCategory;
use App\Entity\Location;
use App\Entity\MusicalGenre;
use App\Entity\Notification;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('NationSoundAdmin');
    }

    public function configureMenuItems(): iterable
    {
        return [

            MenuItem::linkToDashboard('Dashboard', 'fa fa-dashboard'),

            MenuItem::section('Users'),
            MenuItem::linkToCrud('Users', 'fas fa-users', User::class),

            MenuItem::section('Locations'),
            MenuItem::linkToCrud('Location Category', 'fas fa-tag', LocationCategory::class),
            MenuItem::linkToCrud('Location', 'fas fa-location-dot', Location::class),

            MenuItem::section('Events'),
            MenuItem::linkToCrud('Musical Genre', 'fas fa-music', MusicalGenre::class),
            MenuItem::linkToCrud('Artist', 'fas fa-guitar', Artist::class),
            MenuItem::linkToCrud('Event', 'fas fa-calendar', Event::class),

            MenuItem::section('Notifications'),
            MenuItem::linkToCrud('Notification', 'fa-solid fa-circle-exclamation', Notification::class),

        ];
    }
}
