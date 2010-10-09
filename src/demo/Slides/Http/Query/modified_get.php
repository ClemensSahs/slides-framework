<?php

namespace SlidesDemo;

use Slides\Http\Query\Type\String;


// constants and autoloader
include dirname(__FILE__) . DIRECTORY_SEPARATOR .
                            '..' . DIRECTORY_SEPARATOR . '__global.php';

class MyStringClass extends String {
    protected $_lengthMax=10;
    protected $_lengthMin=4;
    protected $_regexpAllowDeny=array(
        '/^test[\d]+$/'=>TRUE
    );
    protected $_regexpNoMatch=FALSE;
    
}














namespace Slides\Http;

use Slides\Http\Query\Methode\Get;
use Slides\Http\Query\Methode\Post;

use Slides\Http\Query\Type\String;
use Slides\Http\Query\Type\Checkbox;






$query=new Query(); 
$query->setParameter( 'test' ,  GET::getInstance(), new \SlidesDemo\MyStringClass );
$query->setParameter( 'check',  GET::getInstance(), new Checkbox );
$query->setParameter( 'checkA', GET::getInstance(), new Checkbox );




var_dump( $query->test );
echo "\n\n";
var_dump( $query->check );
echo "\n\n";
var_dump( $query->checkA );




