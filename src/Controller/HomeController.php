<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends PageController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        $navItems = $this->getNavItems();

        return $this->renderWithNavItems('home/index.html.twig', [
            'message' => 'Welcome to your homepage!',
        ]);
    }
}