<?php

namespace Hanleyandco;

class Util {
    public static function convertStringToId($string) {
        return strtolower(preg_replace('/[\W]+/', '_', $string));
    }
}

