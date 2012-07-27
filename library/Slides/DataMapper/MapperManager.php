<?php

namespace Slides\DataMapper;

class MapperManager {

    protected $_config = null;
    protected $_storage = null;
    protected $_object = null;
    /**
     * 
     * Enter description here ...
     * @param unknown_type $dataObjectName
     * @param unknown_type $findOptions
     * @return Slides\DataMapper\Finder
     */
    public function findDataObject ($dataObjectName,$findOptions=array() ) {
        
    }


    public function init () {
        foreach ( $this->_config['storage'] as $storage ) {
            $this->
        }
    }
    
    
    public function setConfig ($config) {
        $this->_config = $config;
    }
    
    public function setStorage ( $storageName, $storageConfig ) {
        if ( $storageConfig['class'] == "" ){
            throw new \RuntimeException ( ' storage class is not set' );
        }
        if ( $this->_objectInstanceAreAvailable($storageConfig['class']) ) {
            throw new \RuntimeException ( ' storage class is not set' );
        }
        $storage = $this->_getObjectInstance($storageConfig['class']);
        $storage->setConfig( $storageConfig );
        $this->_storage[ $storageName ] = $storage;
    }
    
    public function _objectInstanceAreAvailable ( $classOrAlias ) {
        return class_exists($classOrAlias,true);
    }
    
    public function _getObjectInstance ( $classOrAlias ) {
        return new $storageConfig['class']();
    }
    
}