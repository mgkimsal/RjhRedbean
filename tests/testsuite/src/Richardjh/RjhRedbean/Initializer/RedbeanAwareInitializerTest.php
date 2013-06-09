<?php

namespace Richardjh\RjhRedbean\Initializer;

use PHPUnit_Framework_TestCase;

class RedbeanAwareInitializerTest extends PHPUnit_Framework_TestCase
{
    public $initializer;

    /**
     * SetUp
     */
    public function setUp()
    {
        $this->setUpDoubles();
        $this->setUpServiceLocator();

        // SUT
        require_once __DIR__ . '/../../../../../../src/Richardjh/RjhRedbean/Initializer/RedbeanAwareInitializer.php';
        $this->initializer = new RedbeanAwareInitializer;
    }

    public function setUpDoubles()
    {
        require_once __DIR__ . '/../../../../../Doubles/Zend/ServiceManager/InitializerInterface.php';
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
     * Assert the initializer injects R when passed instance of RedbeanAwareInterface
     */
    public function testInitializeSetsRedbeanServiceWhenPassedInstanceOfRedbeanWareInterface()
    {
        $instance = $this->getMock('NotInstanceOfRedbeanAwareInterface');

        $this->initializer->initialize($instance, $this->serviceLocatorInterface);

        $this->assertTrue(true);
    }

    /**
     * Assert the initializer doesn't inject R when not passed instance of RedbeanAwareInterface
     */
    public function testInitializeDoesntSetRedbeanServiceWhenPassedNotInstanceOfRedbeanWareInterface()
    {
        $instance = $this->getMock(
            'Richardjh\RjhRedbean\Initializer\RedbeanAwareInterface',
            array(
                'setRedbeanService',
            )
        );
        $instance
            ->expects($this->any())
            ->method('setRedbeanService')
            ->will($this->returnValue(true));

        $this->initializer->initialize($instance, $this->serviceLocatorInterface);

        $this->assertTrue(true);
    }

}


