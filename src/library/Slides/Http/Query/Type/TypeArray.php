<?php

namespace Slides\Http\Query\Type;

use Slides\Http\Query\TypeInterface;







class TypeArray implements TypeInterface
{
    protected $_allowValue=array('test');
    
    protected function _trueFalse ($data)
    {
//        var_dump( array_search($data, $this->_checkBoxTrue ) );
        return ( array_search($data, $this->_checkBoxTrue ) !== FALSE
            ? TRUE
            : FALSE );
    }
    
    
    public function isValid ($data)
    {
        if ( !is_array($data) ) {
            return FALSE;
        }
        
        
        echo "=================<br>";
        var_dump( array_diff( $data, $this->_allowValue) );
        var_dump( array_diff( $this->_allowValue, $data) );
        echo "=================<br>";
        
        return FALSE;
    }
    
    public function parse ($data)
    {
        return $this->_trueFalse($data);
    }
    
    
}



