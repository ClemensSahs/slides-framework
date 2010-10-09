<?php

namespace Slides\Http;

use Slides\Http\Query\TypeInterface;
use Slides\Http\Query\Type\Checkbox;
use Slides\Http\Query\Type\Integer;
use Slides\Http\Query\Type\String;


use Slides\Http\Query\MethodeInterface;
use Slides\Http\Query\Methode\File;
use Slides\Http\Query\Methode\Get;
use Slides\Http\Query\Methode\Post;



/**
 * 
 * This class takes care of the data that has sent the cleint and controlled it for pre-defined parameters.
 * 
 * @author Clemens Sahs
 *
 */
class Query
{
    /* Protected Arguments */
    
    protected $_queryParameter=array();

    
    /* Magic Methode */
    
    
    
    
    /**
     * 
     */
    public function __construct ()
    {
    }
    
    /**
     * 
     */
    public function __get ($name)
    {
        if ( !isset( $this->_queryParameter[ $name ] ) ) {
            return NULL;
        }
        
        $methode=$this->_queryParameter[ $name ]['methode'];
        $type=$this->_queryParameter[ $name ]['type'];
        $parse=$this->_queryParameter[ $name ]['parse'];
        
        if ( !$methode instanceof MethodeInterface || !$type instanceof TypeInterface ) {
            return NULL;
        }
        
        if ( $methode->issetParam($name) ) {
            $data= $methode->getParam($name);
        } else {
            $data = null;
        }
        if ( $type->isValid($data) ) {
            return $type->parse($data);
        }
        
        return NULL;
    }
    
    
    
    
    
    /* Public Methode */
    
    

    
    
    /**
     * 
     */
    public function setParameter
    (
        $name,
        MethodeInterface $methode,
        TypeInterface $allowType
        ) {
        $this->_queryParameter[ $name ]=array(
            'methode'=> $methode,
            'type'=> $allowType
        );
    }
    
    
    /**
     * 
     * @todo: checkbox false wird nicht erkannt  
     * 
     */
    public function parameterExsist ( $name )
    {
        if ( $methode->issetParam($name) ) {
            return TRUE;
        }
        return FALSE;
    }
    
    
}