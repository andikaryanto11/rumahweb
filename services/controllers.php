<?php

use App\Controllers\Home;
use App\Controllers\User;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @var ContainerBuilder $containerBuilder
 */
return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->register('home.controller', Home::class)
        ->addArgument(new Reference('view-collection.service'));

    $containerBuilder->register('user.controller', User::class)
        ->addArgument(new Reference('user.repository'))
        ->addArgument(new Reference('view-collection.service'));
};
