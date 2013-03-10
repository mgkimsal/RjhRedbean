<?php

namespace Redbean\Service;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    R;

class RedbeanServiceFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $redbeanService = new R;

        $config = $serviceLocator->get('config');
        $redbeanConfig = $config['redbean'];

        $connection = $redbeanConfig['connection'];
        $dsn = $connection['dsn'];
        $user = $connection['user'];
        $password = $connection['password'];
        $redbeanService->setup($dsn, $user, $password);

        $redbeanService->freeze($redbeanConfig['freeze']);
        $redbeanService->debug($redbeanConfig['debug']);

        return $redbeanService;
    }
}
