<?php

namespace Slides\DataMapper\Mapper;

use Slides\DataMapper\DataObject\DataObjectInterface,
    Slides\DataMapper\MapperManager;

abstract class AbstractMapper {
    protected $_mapperManager = null;
    protected $_dataObjectRegister = null;
    protected $_config = null;
    protected $_storageList = null;
    
    /**
     * 
     * Enter description here ...
     * @param \Slides\DataMapper\MapperManager $mapperManager
     */
    public function setMapperManager ( MapperManager $mapperManager ) {
        $this->_mapperManager = $mapperManager;
    }
    
    /**
     * 
     * Enter description here ...
     * @return MapperManager 
     */
    public function getMapperManager () {
        return $this->_mapperManager;
    }
    
    /**
     * 
     * Enter description here ...
     * @param MapperManager $mapperManager
     */
    public function setDataObjectRegister ( DataObjectRegisterInterface $dataObjectRegister ) {
        $this->_dataObjectRegister = $register;
    }
    
    /**
     * 
     * Enter description here ...
     * @return MapperManager 
     */
    public function getDataObjectRegister () {
        return $this->_dataObjectRegister;
    }
    
    
    /**
     * 
     * @param $data array
     * @return \Slides\DataMapper\DataObject\DataObjectInterface
     */
    abstract public function find($data);
    /**
     * 
     * @param $dataObject \Slides\DataMapper\DataObject\DataObjectInterface
     */
    abstract public function save( DataObjectInterface $dataObject);
    /**
     * 
     * @param $dataObject \Slides\DataMapper\DataObject\DataObjectInterface
     */
    abstract public function delete( DataObjectInterface $dataObject);
    
    
    
    /**
     * 
     * @param $option array
     */
    public function __construct() {
        
        
    }
    
    public function setConfig ($config) {
        $this->_config = $config;
    }
    
    
    /**
     *
     * @param $dataObject \Slides\DataMapper\DataObject\DataObjectInterface
     * @return bool
     */
    public function isMappable ( $dataObject ) {
        return $dataObject instanceof $this->_config['objectClass']; 
    }
    
    public function getStorageList ($useCache = true) {
        if ( $useCache && $this->_storageList !== null ) {
            goto SEND_STORAGE_LIST;
        }
        
        $mapperManager = $this->getMapperManager();
        $this->_storageList = array();
        
        foreach ( $this->_config['property'] as $propertyName=>$options ) {
            $this->_storageList[ $options['storage'] ] = $mapperManager->getStorage($options['storage']); 
        }
        
        SEND_STORAGE_LIST:
            return $this->_storageList;
        
    }
}