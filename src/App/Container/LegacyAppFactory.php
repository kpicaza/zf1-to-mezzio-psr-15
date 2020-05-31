<?php

declare(strict_types=1);

namespace App\Container;

use Psr\Container\ContainerInterface;
use Zend_Application;

class LegacyAppFactory
{
    public function __invoke(ContainerInterface $container): Zend_Application
    {
        defined('APPLICATION_PATH')
        || define('APPLICATION_PATH', dirname(__DIR__) . '/../../modules/legacy/application');

// Define application environment
        defined('APPLICATION_ENV')
        || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ?: 'production'));

        set_include_path(implode(PATH_SEPARATOR, array(
            dirname(APPLICATION_PATH) . '/library',
            get_include_path(),
        )));

        return new Zend_Application(
            APPLICATION_ENV,
            APPLICATION_PATH . '/configs/application.ini'
        );
    }
}
