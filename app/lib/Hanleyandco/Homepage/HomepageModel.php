<?php
/**
 * Created by IntelliJ IDEA.
 * User: kristianepps
 * Date: 29/11/2014
 * Time: 13:44
 */

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

} 