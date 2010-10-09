<?php

namespace Slides\Http\Query\Methode;

use Slides\Http\Query\MethodeAbstract;
use Slides\Http\Query\MethodeInterface;

class Post extends MethodeAbstract implements MethodeInterface
{

    public function getParam($name) {
        return $_POST[ $name ];
    }
    
    
    public function issetParam($name) {
//        echo var_dump( $_POST[ $name ]);
        return isset($_POST[ $name ]);
    }
    
}