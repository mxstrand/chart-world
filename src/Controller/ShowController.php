<?php
// src/Controller/ShowController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class ShowController extends BaseController
{
    public function show(string $navItem): Response
    {
        $navItems = $this->getNavItems();

        return $this->render('shared/show.html.twig', [
            'navItem' => $navItem,
            'navItems' => $navItems,
        ]);
    }
}