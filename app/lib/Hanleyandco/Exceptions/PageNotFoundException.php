<?php

namespace Hanleyandco\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageNotFoundException extends NotFoundHttpException {

    public function __construct($page) {
        parent::__construct($page . 'not found');
    }

}