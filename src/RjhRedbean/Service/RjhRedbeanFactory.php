<?php
/**
 * RjhRedbean ZF2 Module
 *
 * @link      https://github.com/richardjh/RjhRedbean
 * @author    Richard Holloway <richard@richardjh.org>
 */

namespace RjhRedbean\Service;

use Zend\ServiceManager\FactoryInterface,
    Zend\ServiceManager\ServiceLocatorInterface,
    RjhRedbean\Service\RjhRedbean,
    \R;

class RjhRedbeanFactory implements FactoryInterface
{
    public function createService( ServiceLocatorInterface $serviceLocator )
    {
        $rjhRedbean = new RjhRedbean();

        $config = $serviceLocator->get('config');
        $redbean = $config['redbean'];

        $connection = $redbean['connection'];
        $dsn = $connection['dsn'];
        $user = $connection['user'];
        $password = $connection['password'];

        $rjhRedbean->setup($dsn, $user, $password);
        $rjhRedbean->freeze($redbean['freeze']);

        return $rjhRedbean;
    }
}
