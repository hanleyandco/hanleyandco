<?php

namespace Hanleyandco\Homepage;

class HomepageModel {

    private $_title;

    public function __construct()
    {

    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function getTitle() {
        return $this->_title;
    }

    public function getNavBar() {

    }

} 