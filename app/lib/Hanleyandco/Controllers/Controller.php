<?php

namespace Hanleyandco\Controllers;

class Controller {

    protected $_page;
    protected $_app;

    public function __construct(\Silex\Application $app) {
        $this->_app = $app;
    }

    public function show($page) {
        $this->_page = $page;
        return $page;
    }

}