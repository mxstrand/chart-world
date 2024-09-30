<?php
// src/Routing/NavRouteLoader.php
namespace App\Routing;

use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\Config\Loader\LoaderResolverInterface;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Yaml\Yaml;

class NavRouteLoader implements LoaderInterface
{
    private $loaded = false;

    public function __construct()
    {
        // Constructor is firing
    }

    public function load($resource, string $type = null)
    {
        if (true === $this->loaded) {
            throw new \RuntimeException('Do not add the "extra" loader twice');
        }

        $routes = new RouteCollection();

        // Load the YAML file
        $navItems = Yaml::parseFile(__DIR__ . '/../../config/mock_data/nav-list.yaml')['navItems'];

        foreach ($navItems as $navItem) {
            // Set default route to '/' if not provided
            $path = '/' . ($navItem['route'] ?? '');

            $controller = $navItem['controller'] ?? 'App\Controller\ShowController::show';
            $defaults = [
                '_controller' => $controller,
                'navItem' => $navItem['name'],
            ];

            $route = new Route($path, $defaults);
            $routes->add('nav_' . $navItem['name'], $route);
        }

        $this->loaded = true;

        return $routes;
    }

    public function supports($resource, string $type = null)
    {
        return 'nav' === $type;
    }

    public function setResolver(LoaderResolverInterface $resolver)
    {
        // Noop
    }

    public function getResolver()
    {
        // Noop
    }
}