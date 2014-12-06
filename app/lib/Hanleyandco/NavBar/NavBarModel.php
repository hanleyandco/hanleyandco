<?php

namespace Hanleyandco\NavBar;


class NavBarModel {

    private $_navBar;

    public function __construct($navBar) {
        $this->_navBar = $navBar;
    }

    public function getNavBar() {
        return $this->_navBar;
    }

}