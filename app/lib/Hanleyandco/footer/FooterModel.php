<?php

namespace Hanleyandco\footer;

class FooterModel {

    private $_links;
    private $_text;
    private $_images;
    private $_copyright;

    public function __construct($links, $text, $images, $copyright) {
        $this->_links = $links;
        $this->_text = $text;
        $this->_images = $images;
        $this->_copyright = "&copy; " . date("Y") . " " . $copyright;
    }

    public function getLinks() {
        return $this->_links;
    }

    public function getText() {
        return $this->_text;
    }

    public function getImages() {
        return $this->_images;
    }

    public function getCopyright() {
        return $this->_copyright;
    }
}