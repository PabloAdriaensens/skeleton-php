<?php

namespace App;

use App\routing\web;
use DI\ContainerBuilder;
use DI\Container;
use Kint\Kint;

class kernel
{
    private $container;
    private $logger;

    public function __construct()
    {
        $this->container = $this->createContainer();
        Kint::dump($this->container);
        $this->logger = $this->container->get(LogManager::class);
    }

    public function init()
    {
        $this->logger->info("Arrancando la apliación");
        $httpMethod = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $web = new Web();
        $route = $this->container->get(RouterManager::class);
        $route->dispatch($httpMethod, $uri, web::getDispatcher());
    }

    public function createContainer():Container
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->useAutowiring(true);
        return $containerBuilder->build();
    }

    public function getContainer():Container
    {
        return $this->container;
    }
}
