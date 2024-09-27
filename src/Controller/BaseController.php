<?php
// src/Controller/BaseController.php
namespace App\Controller;

use App\Service\YamlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    protected $yamlService;

    public function __construct(YamlService $yamlService)
    {
        $this->yamlService = $yamlService;
    }

    protected function getNavItems(): array
    {
        $data = $this->yamlService->readYamlFile('nav-list.yaml');
        $navItems = [];

        if (isset($data['navItems']) && is_array($data['navItems'])) {
            foreach ($data['navItems'] as $item) {
                $navItems[] = [
                    'name' => $item['name'],
                    'route' => $item['route'] ?? '/',
                    'controller' => $item['controller'] ?? 'App\Controller\NavController',
                ];
            }
        }

        return $navItems;
    }
}