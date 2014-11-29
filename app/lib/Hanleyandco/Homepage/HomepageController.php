<?php

namespace Hanleyandco\Homepage;

class HomepageController {

    protected $_page;
    protected $_app;
    protected $_model;

    public function __construct(\Silex\Application $app) {
        $this->_app = $app;
    }

    public function show() {
        return $this->_app['view-factory'](
            'index',
            array(
                'some_var' => 'woohoo!'
            )
        );
    }
}