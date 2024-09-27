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
        return $this->yamlService->readYamlFile('nav-list.yaml');
    }
}