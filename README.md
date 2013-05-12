Redbean
=======

Load and configure RedbeanPHP ORM.

Install
-------

Install using composer, for example

    {
        "name": "richardjh-site",
        "description": "Richardjh Website",
        "minimum-stability": "dev",
        "require": {
            "php": ">=5.3.3",
            "zendframework/zendframework": "2.1.*",
            "richardjh/redbean": "dev-master"
        },
        "repositories": [
            {
                "type": "vcs",
                "url": "git@bitbucket.org:richardjh/redbean.git"
            }
        ]
    }

And enable in config/application config, for example

    <?php

    return array(
        'modules' => array(
            'Application',
            'richardjh\redbean',
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
Copy vendor/richardjh/redbean/config/autoload/local.php.dist to config/autoload/redbean.local.php and enter the database settings. 
You can find more information about this at http://www.redbeanphp.com/manual/compatible
