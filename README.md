RjhRedbean
==========

RedbeanPHP ORM module for Zend Framework 2

Install
-------

Install using composer, for example

    {
        "name": "application",
        "description": "My Application",
        "require": {
            "php": ">=5.3.3",
            "zendframework/zendframework": "2.1.*",
            "richardjh/rjhredbean": "dev-master"
        }
    }

And enable in config/application config, for example

    <?php

    return array(
        'modules' => array(
            'Application',
            'richardjh\rjhredbean',
        ),
        'module_listener_options' => array(
            'module_paths' => array(
                './module',
                './vendor',
            ),
            'config_glob_paths' => array(
                'config/autoload/{,*.}{global,local}.php',
            ),
        ),
    );

Configure
---------
Copy vendor/richardjh/rjhredbean/config/autoload/local.php.dist to config/autoload/rjhredbean.local.php and enter the database settings.
You can find more information about this at http://www.redbeanphp.com/manual/compatible

Problems
--------
This is a new version of RjhRedbean. I have tagged the old version as v1.0 so if you have problems and want to use the old version you can specify the v1.0 tag in your composer.json file.
Any other problems, please feel free to email me at richard@richardjh.org
