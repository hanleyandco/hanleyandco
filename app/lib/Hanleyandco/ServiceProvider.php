<?php

namespace Hanleyandco;

use Hanleyandco\Controllers\Controller;
use Silex\Application;
use Silex\ServiceProviderInterface;

class ServiceProvider implements ServiceProviderInterface
{
    public function register(Application $app) {

        $app['adapter'] = function() {
            return new GitXmlAdapter();
        };

        $app['main-controller'] = function($app) {
            return new Controller($app);
        };
    }

    public function boot(Application $app) {

    }
}
