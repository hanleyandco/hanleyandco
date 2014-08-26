<?php

namespace Hanleyandco;

class GitXmlAdapter implements Adapter {

    private $_contentDirectory;
    private $_pageDirectory;
    private $_componentDirectory;
    private $_availablePages;

    public function __construct() {
        $this->_contentDirectory = __DIR__.'/../../../vendor/xepps/hanleyandco-content/';
        $this->_pageDirectory = $this->_contentDirectory.'pages/';
        $this->_componentDirectory = $this->_contentDirectory.'components';
    }

    public function fetchAvailablePages() {
        if (empty($this->_availablePages)) {
            $directoryContents = scandir($this->_pageDirectory);
            for ($i = 0; $i < count($directoryContents); $i++) {
                if (is_dir($this->_pageDirectory . $directoryContents[$i])) {
                    unset($directoryContents[$i]);
                }
            }
            $this->_availablePages = array_values($directoryContents);
        }
        return $this->_availablePages;
    }

    public function fetchPage($page) {
        if ($this->isRealPage($page)) {
            return $this->parseXml($page);
        }
        throw new Exceptions\PageNotFoundException($page);
    }

    protected function parseXml($page) {
        return simplexml_load_file($this->_pageDirectory.$page);
    }

    protected function isRealPage($requestedPage) {
        foreach ($this->fetchAvailablePages() as $page) {
            if ($page == $requestedPage) {
                return true;
            }
        }
        return false;
    }

}