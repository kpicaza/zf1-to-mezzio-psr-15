<?php

return static function (Zend_Controller_Router_Interface $router) {
    $route = new Zend_Controller_Router_Route(
        'test',
        array(
            'controller' => 'test',
            'action'     => 'index'
        )
    );

    $router->addRoute('test', $route);
};
