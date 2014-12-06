<?php

namespace Hanleyandco\Homepage;

use Hanleyandco\ModelBuilder;

class HomepageController {

    protected $_app;
    protected $_config;
    protected $_modelBuilder;

    public function __construct(\Silex\Application $app, $config, ModelBuilder $modelBuilder) {
        $this->_app = $app;
        $this->_config = $config;
        $this->_modelBuilder = $modelBuilder;
    }

    public function show() {
        return $this->_app['view-factory'](
            'index',
            array(
                "staticDir" => $this->_config['staticDir'],
                "model" => $this->_modelBuilder->buildHomepageModel(),
                "navBar" => $this->_modelBuilder->buildNavBar()
            )
        );
    }
}