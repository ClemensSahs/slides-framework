<?php

namespace Slides\Http;

use Slides\Http\Query\Methode\Get;
use Slides\Http\Query\Methode\Post;

use Slides\Http\Query\Type\String;
use Slides\Http\Query\Type\Checkbox;



// constants and autoloader
include dirname(__FILE__) . DIRECTORY_SEPARATOR .
                            '..' . DIRECTORY_SEPARATOR . '__global.php';




$query=new Query(); 
$query->setParameter( 'test' ,  Post::getInstance(), new String );
$query->setParameter( 'check',  Post::getInstance(), new Checkbox );
$query->setParameter( 'checkA', Post::getInstance(), new Checkbox );




var_dump( $query->test );
echo "\n\n";
var_dump( $query->check );
echo "\n\n";
var_dump( $query->checkA );