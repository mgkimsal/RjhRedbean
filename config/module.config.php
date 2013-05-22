<?php

return array(
    'service_manager' => array(
        'factories' => array(
            'RjhRedbean' => 'Richardjh\RjhRedbean\Service\RjhRedbeanServiceFactory',
        ),
        'initializers' => array(
            'RedbeanAwareInitializer' => 'Richardjh\RjhRedbean\Initializer\RedbeanAwareInitializer',
        ),
    ),
);
