<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.
// Returns the private 'routing.loader.service' shared service.

include_once $this->targetDirs[3].'/vendor/symfony/config/Loader/LoaderInterface.php';
include_once $this->targetDirs[3].'/vendor/symfony/config/Loader/Loader.php';
include_once $this->targetDirs[3].'/vendor/symfony/routing/Loader/ObjectRouteLoader.php';
include_once $this->targetDirs[3].'/vendor/symfony/routing/Loader/DependencyInjection/ServiceRouterLoader.php';

return $this->privates['routing.loader.service'] = new \Symfony\Component\Routing\Loader\DependencyInjection\ServiceRouterLoader($this);
