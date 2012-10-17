RjhRedbean
==========

A ZF2 module to integrate RedbeanPHP ORM into a ZF2 application

INSTALLATION
------------

RjhRedbean is not available in packagist just yet. I will work on that shortly. 
For now you have to add the git repository to your composer configuration in order to install RjhRedbean.

Edit your main /composer.json file to look like this:

	{
		"name": "zendframework/skeleton-application",
		"description": "Skeleton Application for ZF2",
		"license": "BSD-3-Clause",
		"keywords": [
			"framework",
			"zf2"
		],
		"homepage": "http://framework.zend.com/",
		"repositories": [
		{
			"type":"vcs",
			"url":"https://github.com/richardjh/RjhRedbean.git"
		}
		],
		"require": {
			"php": ">=5.3.3",
			"zendframework/zendframework": "2.*",
			"gabordemooij/redbean": "dev-master",
			"richardjh/RjhRedbean": "dev-master"
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
			RjhRedbean/
		zendframework/
			zendframework/
		ZF2/

You now need to enable the RjhRedbean module in your application. Note that RedbeanPHP ORM is not itself a ZF2 module and does not need to be enabled.

Edit your config/application.php file to look like:

	<?php
	return array(
		'modules' => array(
			'Application',
			'RjhRedbean',
		),
		'module_listener_options' => array(
			'config_glob_paths'    => array(
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
	vendor/richardjh/RjhRedbean/config/local.php.dist 
to 
	vendor/richardjh/RjhRedbean/config/local.php 
and edit the new file with your database settings.

USING RjhRedbean IN YOUR APPLICATION
------------------------------------



