RjhRedbean
==========

A ZF2 module to integrate RedbeanPHP ORM into a ZF2 application

RjhRedbean now supports [Fuse](http://redbeanphp.com/community/wiki/index.php/Fuse). 
Please see my blog post on [how to use FUSE models in RjhRedbean](http://richardjh.org/blog/how-to-use-fuse-models-in-rjhredbean)


INSTALLATION
------------

RjhRedbean is available in packagist as richardjh/rjhredbean.

Edit your main composer.json file to look like this:

	{
		"name": "zendframework/skeleton-application",
		"description": "Skeleton Application for ZF2",
		"license": "BSD-3-Clause",
		"keywords": [
			"framework",
			"zf2"
		],
		"homepage": "http://framework.zend.com/",
		"require": {
			"php": ">=5.3.3",
			"zendframework/zendframework": "2.*",
			"gabordemooij/redbean": "dev-master",
			"richardjh/rjhredbean": "dev-master"
		}
	}


Now run 

	php composer.phar install

Assumming all went well, your vendor directory should now look like:

	vendor/
		autoload.php
		composer/
			autoload_classmap.php
			autoload_namespaces.php
			autoload_real.php
			ClassLoader.php
			installed.json
		gabordemooij/
			redbean/
		README.md
		richardjh/
			rjhredbean/
		zendframework/
			zendframework/
		ZF2/

You now need to enable the RjhRedbean module in your application. Note that RedbeanPHP ORM is not itself a ZF2 module and does not need to be enabled.

Edit your config/application.php file to look like:

	<?php
	return array(
		'modules' => array(
			'Application',
			'rjhredbean',
		),
		'module_listener_options' => array(
			'config_glob_paths'	=> array(
				'config/autoload/{,*.}{global,local}.php',
			),
			'module_paths' => array(
				'./module',
				'./vendor',
				'./vendor/richardjh',
			),
		),
	); 

Now test your application still runs at this point. If there are any problems, please let me know.

CONFIGURING RjhRedbean
----------------------

You need to set up your database connection settings. 

Copy 

	vendor/richardjh/rjhredbean/config/local.php.dist 

to 

	config/autoload/redbean.local.php 
	
and edit the new redbean.local.php file with your database settings.

USING RjhRedbean IN YOUR APPLICATION
------------------------------------

You access the configured instance of RedbeanPHP ORM using the service locator. The key name is RjhRedbean.

As an example, here is a Service factory to inject RjhRedbean into a service called PageService:

	<?php

	namespace Yournamespace\Service;

	use Zend\ServiceManager\FactoryInterface,
	Zend\ServiceManager\ServiceLocatorInterface;

	class PageServiceFactory implements FactoryInterface
	{
		public function createService(ServiceLocatorInterface $serviceLocator)
		{
			$pageService = new PageService;
			$pageService->setRedbeanService($serviceLocator->get('RjhRedbean'));

			return $pageService;
		}
	}

And the setter code in the Service would look like:

	public function setRedbeanService(RjhRedbean\Service\RjhRedbean $redbeanService)
	{
		$this->redbeanService = $redbeanService;
	}

Then you could have a method to get a page based on the slug, for example:

	public function getPage($slug, $type = 'default')
	{
		$page = $this->redbeanService->findOne(
			'page'
			' slug = :slug AND type = :type ',
			array(
				':slug' => $slug,
				':type' => $type
			)
		);

		return $page;	
	}

*Please report problems to richard@richardjh.org*


