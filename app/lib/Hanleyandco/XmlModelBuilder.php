<?php

namespace Hanleyandco;

use Hanleyandco\Homepage\HomepageModel;
use Hanleyandco\NavBar\NavBarModel;

class XmlModelBuilder implements ModelBuilder {

    public function buildHomepageModel()
    {
        $data = simplexml_load_file(__DIR__.'/../../../static/content/home.xml');
        $model = new HomepageModel();
        $model->setTitle($data->title);
        return $model;
    }

    public function buildNavBar()
    {
        $data = simplexml_load_file(__DIR__.'/../../../static/content/home.xml');
        $navBar = array();
        foreach($data->sections->section as $section) {
            $navBar[] = array("name" => $this->convertToName($section[0]->header),
                              "title" => $section[0]->header);
        }
        $model = new NavBarModel($navBar);
        return $model;
    }

    function convertToName($string) {
        return strtolower(preg_replace('/[\W]+/', '_', $string));
    }
}
