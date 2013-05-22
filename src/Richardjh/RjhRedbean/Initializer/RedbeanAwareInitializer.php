<?php

namespace Richardjh\RjhRedbean\Initializer;

use R;
use Zend\ServiceManager\InitializerInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class RedbeanAwareInitializer implements InitializerInterface
{
    /**
     * If something implements the RedbeanAwareInterface, this will inject the Redbean Service
     *
     * @param $instance
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function initialize($instance, ServiceLocatorInterface $serviceLocator)
    {
        if($instance instanceof RedbeanAwareInterface) {
            $redbean = $serviceLocator->get('RjhRedbean');
            /** @var $redbean R */
            $instance->setRedbeanService($redbean);
        }
    }
}