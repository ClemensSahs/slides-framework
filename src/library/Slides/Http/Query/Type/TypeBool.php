<?php

namespace Slides\Http\Query\Type;

use Slides\Http\Query\TypeInterface;







class TypeBool implements TypeInterface
{
    protected $_allowValue=array('on','off','true','false','1','0');
    protected $_allowTrue=array('on','true','1');
    
    
    protected function _trueFalse ($data)
    {
//        var_dump( array_search($data, $this->_checkBoxTrue ) );
        return ( array_search($data, $this->_allowTrue ) !== FALSE
            ? TRUE
            : FALSE );
    }
    
    
    public function isValid ($data)
    {
        if ( is_null( $data) || array_search($data, $this->_allowValue ) !== FALSE ) {
            return TRUE;
        }
        return FALSE;
    }
    
    public function parse ($data)
    {
        return $this->_trueFalse($data);
    }
    
    
}



