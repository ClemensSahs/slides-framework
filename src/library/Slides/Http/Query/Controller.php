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
namespace Slides\Http\Query;

use Slides\Http\Query;

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
 * @package     Slides\Http
 *
 */
class Controller extends Query
{
    /**
     * anzahl der Parameter
     * @var array
     */
    protected $_queryParameter_count=array();

    
    
    
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
    
    
}