<?php
// src/Controller/FooController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FooController extends BaseController
{
    public function foo(string $navItem): Response
    {
        $navItems = $this->getNavItems();

        return $this->render('pages/foo.html.twig', [
            'navItem' => $navItem,
            'navItems' => $navItems,
        ]);
    }
}