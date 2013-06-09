<?php

namespace Richardjh\RjhRedbean\Service;

use PHPUnit_Framework_TestCase;

class RjhRedbeanServiceFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RjhRedbeanServiceFactory
     */
    public $factory;

    /**
     * @var ServiceLocatorInterface
     */
    public $serviceLocatorInterface;

    /**
     * SetUp
     */
    public function setUp()
    {
        $this->setUpDoubles();
        $this->setUpServiceLocator();

        // SUT
        require_once __DIR__ . '/../../../../../../src/Richardjh/RjhRedbean/Service/RjhRedbeanServiceFactory.php';
        $this->factory = new RjhRedbeanServiceFactory;
    }

    /**
     * Mock objects
     */
    public function setUpDoubles()
    {
        require_once __DIR__ . '/../../../../../Doubles/R.php';
        require_once __DIR__ . '/../../../../../Doubles/Zend/ServiceManager/FactoryInterface.php';
    }

    /**
     * Mock the service locator
     */
    public function setUpServiceLocator()
    {
        $config = $this->getConfig();
        $this->serviceLocatorInterface = $this->getMock(
            'Zend\ServiceManager\ServiceLocatorInterface',
            array(
                'get',
            )
        );
        $this->serviceLocatorInterface
            ->expects($this->any())
            ->method('get')
            ->will($this->returnValue($config));
    }

    /**
     * Get an config from the example dist file
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/../../../../../../config/local.dist.php';
    }

    /**
     * Assert the factory returns an instance of R
     */
    public function testCreateServiceReturnsR()
    {
        $service = $this->factory->createService($this->serviceLocatorInterface);

        $this->assertInstanceOf('R', $service);
    }

}


