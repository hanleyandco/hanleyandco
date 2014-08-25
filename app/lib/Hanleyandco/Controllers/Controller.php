<?php

namespace Hanleyandco\Controllers;

class Controller {

    protected $_page;

    public function __construct(\Silex\Application $app) {

    }

    public function show($page) {
        $this->_page = $page;
        echo $page;
        return $page;
    }

}