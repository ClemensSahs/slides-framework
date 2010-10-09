<?php

namespace Slides\Http\Query\Type;

use Slides\Http\Query\TypeInterface;


class String implements TypeInterface {
    public function isValid($data) {
        return TRUE;
    }
    
    public function parse($data) {
        return $data;
    }
}