<?php

namespace Hanleyandco;

interface Adapter {

    public function fetchAvailablePages();
    public function fetchPage($page);

}