<?php

namespace Hanleyandco;

use Hanleyandco\Homepage\HomepageController;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app) {
        $app['home-controller'] = function($app) {
            return new HomepageController($app);
        };

        $app['view-factory'] = function() {
            return function($viewName, $viewArgs = array(), $statusCode = 200, $headers = array()) {
                $viewPath = __DIR__ . '/../views/' . $viewName . '.php';
                return new ViewResponse($viewPath, $viewArgs, $statusCode, $headers);
            };
        };
    }

    public function boot(Application $app) {

    }
}
