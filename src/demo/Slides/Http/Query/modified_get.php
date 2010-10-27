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

use Slides\Http\Query\Type\Integer;

use Slides\Http\Query\Methode\Get;
use Slides\Http\Query\Methode\Post;

use Slides\Http\Query\Type\String;
use Slides\Http\Query\Type\Checkbox;




$query=new Query(); 
$query->setParameter( 'test' ,  Get::getInstance(), new \SlidesDemo\MyStringClass, 'testblub' );
$query->setParameter( 'select' ,Get::getInstance(), new Integer(), 3 );
$query->setParameter( 'checkA', Get::getInstance(), new Bool );
$query->setParameter( 'checkB', Get::getInstance(), new Bool);


$query->defaultAble();

?><!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


</head>
<body>


<form action="" method="get">
    test: <input type="text" name="test" value="<?php echo $query->parameterExsist('test') ? $query->test : 'test1';?>"><br>
    select: <select name="select">
        <option value="">-bitte w�hlen-</option>
        <option value="1">eins</option>
        <option value="2">zwei</option>
    </select><br>
    checkA: <input type="checkbox" name="checkA" <?php echo $query->checkA ? 'checked="checked" ' : '';?>><br>
    checkB: <input type="checkbox" name="checkB" <?php echo $query->checkB ? 'checked="checked" ' : '';?>><br>
    <input type="submit" value="senden"><br>

</form>
<br>
<br>



<pre><?php

if ( $query->parameterExsist('test') ) {
    $data=array( 'test','select','checkA','checkB' );

    foreach ( $data as $key ) {
            
        echo $key . ': ';
        var_dump( $query->{$key} );
        echo "\n\n";
        
    }
    
    
}

?></pre>

</body>
</html>