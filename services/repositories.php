<?php

use App\Repositories\UserRepository;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * @var ContainerBuilder $containerBuilder
 */

return function (ContainerBuilder $containerBuilder) {

    $containerBuilder->register('user.repository', UserRepository::class);
};
