<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initRoutes()
    {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        $enableRouter = include APPLICATION_PATH . "/configs/routes.php";

        $enableRouter($router);
    }

}

