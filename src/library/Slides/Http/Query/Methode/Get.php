<?php

namespace Slides\Http\Query\Methode;

use Slides\Http\Query\MethodeAbstract;
use Slides\Http\Query\MethodeInterface;



class Get extends MethodeAbstract implements MethodeInterface
{

    public function getParam($name) {
        return $_GET[ $name ];
    }
    
    
    public function issetParam($name) {
//        echo var_dump( $_GET[ $name ]);
        return isset($_GET[ $name ]);
    }
    
}