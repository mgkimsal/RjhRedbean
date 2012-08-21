<?php
/**
 * RjhRedbean ZF2 Module
 *
 * @link      https://github.com/richardjh/RjhRedbean
 * @author    Richard Holloway <richard@richardjh.org>
 */

return array(
    'service_manager' => array(
        'factories' => array(
            'RjhRedbean' => 'RjhRedbean\Service\RjhRedbeanFactory',
        ),
    ),
);
