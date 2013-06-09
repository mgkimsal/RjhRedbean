<?php

namespace Richardjh\RjhRedbean;

use PHPUnit_Framework_TestCase;

class ModuleTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Module
     */
    public $module;

    /**
     * SetUp
     */
    public function setUp()
    {
        // SUT
        require_once __DIR__ . '/../../Module.php';
        $this->module = new Module;
    }

    public function testGetConfigReturnsArray()
    {
        $config = $this->module->getConfig();

        $this->assertTrue(is_array($config));
    }

    public function testGetAutoloaderConfigReturnsArray()
    {
        $config = $this->module->getAutoloaderConfig();

        $this->assertTrue(is_array($config));
    }
}