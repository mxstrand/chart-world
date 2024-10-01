<?php
// src/Controller/PageController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PageController extends BaseController
{
    public function renderWithNavItems(string $view, array $parameters = [], string $selectedNavItem = null, Response $response = null): Response
    {
        $parameters['navItems'] = $this->getNavItems();
        $parameters['selectedNavItem'] = $selectedNavItem;
        return $this->render($view, $parameters, $response);
    }
}