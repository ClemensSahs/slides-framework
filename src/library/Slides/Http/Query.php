<?php
/**
 * Slides Framework
 *
 * @category     Slides
 * @package      Slides\Http
 * @copyright    Copyright (c) 2010 Slides Worker. (http://www.slides-worker.org)
 * @license      MIT or LGPL
 */

/**
 * @namespace
 */
namespace Slides\Http;

use Slides\Http\Query\TypeInterface,
    Slides\Http\Query\MethodeInterface;

/**
 * \Slides\Http\Query
 * 
 * This class takes care of the data that has sent the cleint and controlled it for pre-defined parameters.
 * 
 * @uses        \Slides\Http\Query\TypeInterface
 * @uses        \Slides\Http\Query\MethodeInterface
 *
 * @category    Slides
 * @package     Slides\Http 
 * @subpackage  Query
 * @author      Clemens Sahs
 *
 */
class Query
{
    /**
     * Parameter Index
     * @var array
     */
    protected $_queryParameter=array();
    protected $_defaultUse=FALSE;

    
    
    /**
     * Constructor
     */
    public function __construct ()
    {
    }
    
    
    
    /**
     * Get the Input Var
     * 
     * If the value not set or the wrong type and defaultUse is TRUE,
     * it returns the default value. Else it return NULL.
     * 
     * @param string $name
     * @return mixed
     */
    public function __get ($name)
    {   
        
        var_dump( $name );
        if ( !isset( $this->_queryParameter[ $name ] ) ) {
            return NULL;
        }
        
        
        
        $methode=$this->_queryParameter[ $name ]['methode'];
        $type=$this->_queryParameter[ $name ]['type'];
        $parse=$this->_queryParameter[ $name ]['parse'];
        $default=$this->_queryParameter[ $name ]['default'];
        
        
        
        if ( !$methode instanceof MethodeInterface || !$type instanceof TypeInterface ) {
            throw Exception ( '$methode or $type not a supported instance');
        }
        
        
        
        if ( $methode->issetParam($name) ) {
            $data= $methode->getParam($name);
        } else {
            $data = null;
        }
        
        if ( $type->isValid($data) ) {
            return $type->parse($data);
        }
        
        
        
        if ( $this->_defaultUse || $this->_queryParameter[ $name ]['default'] ) {
            return $default;
        }
        return null;
    }
    
    
    
    
    
    /* Public Methode */
    
    

    
    
    /**
     * 
     */
    public function setParameter
    (
        $name,
        MethodeInterface $methode,
        TypeInterface $allowType,
        $default = null
        ) {
        $this->_queryParameter[ $name ]=array(
            'default'=> $default,
            'defaultUse'=> FALSE,
            'methode'=> $methode,
            'type'=> $allowType
        );
    }
    
    
    /**
     * 
     * @NTH checkbox false wird nicht erkannt
     */
    public function parameterExsist ( $name )
    {
        $methode=$this->_queryParameter[ $name ]['methode'];
        if ( $methode->issetParam($name) ) {
            return TRUE;
        }
        return FALSE;
    }
    
    
    /**
     * 
     */
    public function defaultAble ( array $paramList=array() )
    {
        if ( count( $paramList ) == 0 ) {
            $this->_defaultUse=TRUE;
        } else {
            array_walk($paramList, function (&$value,$key) {
                $value=TRUE;
            });
        }
    }
    
    
    /**
     * 
     */
    public function defaultDisable ( array $paramList=array() )
    {
        if ( count( $paramList ) == 0 ) {
            $this->_defaultUse=FALSE;
        } else {
            array_walk($paramList, function (&$value,$key) {
                $value=FALSE;
            });
        }
    }
    
    
}