<?php

use App\Controllers\Home;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @var ContainerBuilder $containerBuilder
 */
return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->register('home.controller', Home::class)
        ->addArgument(new Reference('view-collection.service'));
};
