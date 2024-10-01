<?php
// src/Controller/IconsController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Service\YamlService;

class IconsController extends PageController
{
    protected $yamlService; // Change access level to protected

    public function __construct(YamlService $yamlService)
    {
        $this->yamlService = $yamlService;
    }

    /**
     * @Route("/icons", name="pages/icons.html.twig")  
     */
    public function show(string $navItem = 'default'): Response
    {
        $icons = $this->yamlService->readYamlFile('icons-fill.yaml');

        return $this->renderWithNavItems('pages/icons.html.twig', [
            'icons' => $icons
        ]);
    }
}