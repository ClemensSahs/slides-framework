<?php

namespace Slides\DataMapper\Mapper;

use Slides\DataMapper\DataObject\DataObjectInterface;

class SimpleMapper
    extends AbstractMapper {
    /**
     * 
     * @param $data array
     * @return \Slides\DataMapper\DataObject\DataObjectInterface
     */
    public function find($data) {
        
    }
    /**
     * 
     * @param $dataObject \Slides\DataMapper\DataObject\DataObjectInterface
     */
    public function save( DataObjectInterface $dataObject) {
        if ( false === $this->isMappable($dataObject) ) {
            throw new \RuntimeException('data object is not a instance of the supported class');
        }
        
        
        
        
        $storageList = $this->getStorageList();
        $storageList->
    }
    /**
     * 
     * @param $dataObject \Slides\DataMapper\DataObject\DataObjectInterface
     */
    public function delete( DataObjectInterface $dataObject) {
        
    }
}