<?php

use Ci4Common\Libraries\ViewCollectionLib;
use Ci4Common\Services\ViewCollectionService;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @var ContainerBuilder $containerBuilder
 */

return function (ContainerBuilder $containerBuilder) {

    $containerBuilder->register('view-collection.service', ViewCollectionService::class)
        ->addArgument(new ViewCollectionLib());

};
