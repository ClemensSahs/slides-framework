<?php

namespace Slides\DataMapper;

class AbstractMapper {
	protected $_mapperManager = null;
	protected $_dataObjectRegister = null;
	
	/**
	 * 
	 * Enter description here ...
	 * @param MapperManager $mapperManager
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
	abstract public function save($dataObject);
	/**
	 * 
	 * @param $dataObject \Slides\DataMapper\DataObject\DataObjectInterface
	 */
	abstract public function delete($dataObject);
	
	
	
	/**
	 * 
	 * @param $option array
	 */
	public function __construct($data) {
		
		
	}
	
	/**
	 * 
	 * Enter description here ...
	 */
	public function setDataObjectRegister () {
		
	}
}