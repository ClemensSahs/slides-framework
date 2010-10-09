<?php

namespace Slides\Http\Query\Type;

use Slides\Http\Query\TypeInterface;


class String implements TypeInterface
{
    /** schrenkt die maximale Zeichenlänge ein */
    protected $_lengthMax=null;
    
    /** schrenkt die minimale Zeichenlänge ein */
    protected $_lengthMin=null;
    
    /** verbiette oder erlaubt die Eingabe auf die dieser RegExp zutrifft */
    protected $_regexpAllowDeny=null;
    protected $_regexpNoMatch=TRUE;
    
    
    
    public function _checkRegexp($data)
    {
        foreach ( $this->_regexpAllowDeny as $regexp=>$choose ) {
            if ( preg_match( $regexp, $data) ) {
                if( is_null($choose) ){
                    continue;
                } elseif ( $choose === TRUE ) {
                    return TRUE;
                } elseif ( $choose === FALSE ) {
                    return FALSE;
                }
            } elseif ( is_null($choose) ) {
                return FALSE;
            }
        }
        
        return $this->_regexpNoMatch;
    }
    
    
    public function isValid($data)
    {
        
        // maximale Zeichen kontrolle
        if ( !is_null($this->_lengthMax) && isset($data{$this->_lengthMax} ) ) {
            return FALSE;
        }
        // minimale Zeichen kontrolle
        if ( !is_null($this->_lengthMin) && !isset($data{$this->_lengthMin-1} ) ) {
            return FALSE;
        }
        
        // RegExp Kontroll
        if ( !is_null($this->_regexpAllowDeny) && !$this->_checkRegexp($data) ) {
            return FALSE;
        }
        
        return TRUE;
    }
    
    public function parse($data)
    {
        return $data;
    }
    
    
}