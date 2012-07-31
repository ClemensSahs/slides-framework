<?php

namespace Slides\DataMapper\DataObject;

class DataObject
    extends AbstractDataObject {
    
    protected $_data = array();

    public function get( $propertyName ) {
        return $this->_data[ $propertyName ];
    }
    public function set( $propertyName, $content ) {
        $this->_data[ $propertyName ] = $content;
    }
    
}