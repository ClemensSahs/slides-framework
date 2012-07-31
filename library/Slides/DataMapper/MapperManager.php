<?php

namespace Slides\DataMapper;

class MapperManager {

    protected $_config = null;
    protected $_storage = null;
    protected $_mapper = null;
    protected $_objectPrototype = null;
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
    }
    
    
    public function setConfig ($config) {
        $this->_config = $config;
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
    
    public function initMapper ( $mapperName, $mapperOptions ) {
        if ( is_object( $mapperOptions ) ) {
            if ( false === is_subclass_of($mapperOptions,"Slides\DataMapper\Mapper\AbstractMapper") ) {
                throw new \RuntimeException ( 'mapper object is not a subclass of AbstractMapper' );
            }
            
            $mapper = $mapperOptions;
            
        } elseif ( is_array( $mapperOptions ) ) {
            if ( $mapperOptions['mapperClass'] == "" ){
                throw new \RuntimeException ( 'mapper class is not set' );
            }
            
            $classNameAlias = $mapperOptions['mapperClass'];
            if ( false === $this->_objectInstanceAreAvailable($classNameAlias) ) {
                throw new \RuntimeException ( ' mapper class is not available' );
            }
            if ( false === is_subclass_of($classNameAlias,"Slides\DataMapper\Mapper\AbstractMapper") ) {
                throw new \RuntimeException ( 'mapper class is not a subclass of AbstractMapper' );
            }
            
            $mapper= $this->_getObjectInstance($classNameAlias);
            $mapper->setConfig( $mapperOptions );
            
        } else {
            throw new \RuntimeException ( 'mapperOptions are not usable' );
        }
        
        $mapper->setMapperManager ($this);
        
        $this->_mapper[ $mapperName ] = $mapper;
    }
    
    public function hasMapper ( $mapperName ) {
        return isset($this->_config['mapper'][ $mapperName ]);
    }
    
    public function isInitMapper ( $mapperName ) {
        return isset($this->_mapper[ $mapperName ]);
    }
    
    public function getMapper ( $mapperName ) {
        if ( false === $this->isInitMapper($mapperName) ) {
            if ( false === $this->hasMapper($mapperName) ) {
                throw new \RuntimeException ( 'mapper is not exist' );
            }
            $storageOptions = $this->_config['mapper'][ $mapperName ];
        
            $this->initMapper( $mapperName, $storageOptions );
        }
        
        return $this->_mapper[ $mapperName ];
    }
    
    public function initStorage ( $storageName, $storageOptions ) {
        if ( $storageOptions['class'] == "" ){
            throw new \RuntimeException ( ' storage class is not set' );
        }
        
        $classNameAlias = $storageOptions['class'];
        
        if ( false === $this->_objectInstanceAreAvailable($classNameAlias) ) {
            throw new \RuntimeException ( ' storage class is not available' );
        }
        if ( false === is_subclass_of($classNameAlias,"Slides\DataMapper\Storage\AbstractStorage") ) {
            throw new \RuntimeException ( 'storage class is not a subclass of AbstractStorage' );
        }
        
        $storage = $this->_getObjectInstance($classNameAlias);
        $storage->setConfig( $storageOptions );
        $storage->init();
        $this->_storage[ $storageName ] = $storage;
    }
    
    public function hasStorage ( $storageName ) {
        return isset($this->_config['storage'][ $storageName ]);
    }
    
    public function isInitStorage ( $storageName ) {
        return isset($this->_storage[ $storageName ]);
    }
    
    public function getStorage ( $storageName ) {
        if ( false === $this->isInitStorage($storageName) ) {
            if ( false === $this->hasStorage($storageName) ) {
                throw new \RuntimeException ( 'storage is not exist' );
            }
            $storageOptions = $this->_config['storage'][ $storageName ];
            
            $this->initStorage( $storageName, $storageOptions );
        }
        
        return $this->_storage[ $storageName ];
    }
    
    public function _objectInstanceAreAvailable ( $classOrAlias ) {
        return class_exists($classOrAlias,true);
    }
    
    public function _getObjectInstance ( $classOrAlias ) {
        return new $classOrAlias();
    }
    
}