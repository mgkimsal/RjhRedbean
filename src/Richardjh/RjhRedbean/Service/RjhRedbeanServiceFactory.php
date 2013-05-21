<?php

namespace Richardjh\RjhRedbean\Service;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use R;

class RjhRedbeanServiceFactory implements FactoryInterface
{
    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return R
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $rjhRedbeanService = new R;

        $config = $serviceLocator->get('config');
        $rjhRedbeanConfig = $config['rjhredbean'];

        $connection = $rjhRedbeanConfig['connection'];
        $dsn = $connection['dsn'];
        $user = $connection['user'];
        $password = $connection['password'];
        $rjhRedbeanService->setup($dsn, $user, $password);

        $rjhRedbeanService->freeze($rjhRedbeanConfig['freeze']);
        $rjhRedbeanService->debug($rjhRedbeanConfig['debug']);

        return $rjhRedbeanService;
    }
}
