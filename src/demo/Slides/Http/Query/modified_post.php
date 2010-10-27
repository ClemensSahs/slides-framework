<?php

namespace SlidesDemo;

use Slides\Http\Query\Type\TypeString;


// constants and autoloader
include dirname(__FILE__) . DIRECTORY_SEPARATOR .
                            '..' . DIRECTORY_SEPARATOR . '__global.php';

class MyStringClass extends TypeString {
    protected $_lengthMax=10;
    protected $_lengthMin=4;
    protected $_regexpAllowDeny=array(
        '/^test[\d]+$/'=>TRUE
    );
    protected $_regexpNoMatch=FALSE;
    
}



namespace Slides\Http;

use Slides\Http\Query\Type\TypeBool;

use Slides\Http\Query\Type\TypeArray;

use Slides\Http\Query\Type\TypeInteger;

use Slides\Http\Query\Type\Integer;

use Slides\Http\Query\Methode\Get;
use Slides\Http\Query\Methode\Post;

use Slides\Http\Query\Type\String;
use Slides\Http\Query\Type\Checkbox;




$query=new Query(); 
$query->setParameter( 'test' ,  Post::getInstance(), new \SlidesDemo\MyStringClass, 'testblub' );
$query->setParameter( 'select' ,Post::getInstance(), new TypeInteger(), 3 );
$query->setParameter( 'checkA', Post::getInstance(), new TypeArray() );
$query->setParameter( 'checkB', Post::getInstance(), new TypeBool() );

$query->defaultAble();

?><!DOCTYPE unspecified PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>


</head>
<body>


<form action="" method="post">
    test: <input type="text" name="test" value="<?php echo $query->parameterExsist('test') ? $query->test : 'test1';?>"><br>
    select: <select name="select">
        <option value="">-bitte wählen-</option>
        <option value="1">eins</option>
        <option value="2">zwei</option>
    </select><br>
    checkA: <input type="checkbox" name="checkA[]" value="test" <?php echo $query->checkA['test'] ? 'checked="checked" ' : '';?>><br>
    checkA: <input type="checkbox" name="checkA[]" value="test12" <?php echo $query->checkA ? 'checked="checked" ' : '';?>><br>
    checkB: <input type="checkbox" name="checkB" value="test12" <?php echo $query->checkB ? 'checked="checked" ' : '';?>><br>
    <input type="submit" value="senden"><br>

</form>
<br>
<br>



<pre><?php

print_r( $_REQUEST );

if ( $query->parameterExsist('test') ) {
//    $data=array( 'test','select','checkA','checkB' );
    $data=array( 'checkA');

    foreach ( $data as $key ) {
            
        echo $key . ': ';
        var_dump( $query->{$key} );
        echo "\n\n";
        
    }
    
    
}

?></pre>

</body>
</html>