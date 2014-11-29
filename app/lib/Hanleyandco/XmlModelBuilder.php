<?php

namespace Hanleyandco;

use Hanleyandco\Homepage\HomepageModel;

class XmlModelBuilder implements ModelBuilder {

    public function buildHomepageModel()
    {
        $data = simplexml_load_file(__DIR__.'/../../../vendor/xepps/hanleyandco-content/pages/home.xml');
        $model = new HomepageModel();
        $model->setTitle($data->title);
        return $model;
    }
}