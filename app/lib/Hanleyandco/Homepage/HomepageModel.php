<?php

namespace Hanleyandco\Homepage;

use Hanleyandco\Util;

class HomepageModel {

    private $_title;
    private $_sections;

    public function __construct($title, $sections)
    {
        $this->_title = $title;
        foreach($sections as $section) {
            $this->_sections[] = new SectionModel($section->header, $section->content);
        }
    }

    public function setTitle($title) {
        $this->_title = $title;
    }

    public function getTitle() {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getSections()
    {
        return $this->_sections;
    }

}

class SectionModel {

    private $_title;
    private $_id;
    private $_content;

    public function __construct($title, $content) {
        $this->_title = $title;
        $this->_id = Util::convertStringToId($title);
        $this->_content = $content;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->_content;
    }
}