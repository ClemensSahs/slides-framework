<?php

namespace Slides\Http\Query\Type;

use Slides\Http\Query\TypeInterface;


class TypeInteger implements TypeInterface {
    public function isValid($data) {
        if ( (int)$data + 1 > 1 ) {
            return TRUE;
        }
        if ( preg_match('/^\d+$/', $data) ) {
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function parse($data) {
        return (int) $data;
    }
}