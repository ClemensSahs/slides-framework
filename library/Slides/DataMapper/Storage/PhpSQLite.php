<?php

namespace Slides\DataMapper\Storage;

class PhpSQLite
    extends AbstractStorage {
    
    protected $_config= null;
    protected $_dbLink = null;

    public function setConfig ( $storageOptions ) {
        $this->_config = $storageOptions;
    }
    public function init() {
        $this->dbLink = new \SQLite3( $this->_config['option']['db.file'] );
        
        $this->dbLink->exec('CREATE TABLE IF NOT EXISTS user (id INTEGER,name STRING)');
        
        $result = $this->dbLink->query('SELECT * FROM user');
        
        if ( $result->numColumns() > 0 ) {
            $this->dbLink->exec("INSERT INTO user (name) VALUES ('foo')");
            $this->dbLink->exec("INSERT INTO user (name) VALUES ('bar')");
            $this->dbLink->exec("INSERT INTO user (name) VALUES ('boo')");
        }
    }

    public function find ($id) {
    
    }
    public function getWhereDataFor ($id) {
    
    }
    public function save ( Slides\DataMapper\DataObject\AbstractDataObject $dataObject, &$wantedUpdateData) {
        
        $tableList = array();
        foreach ( $wantedUpdateData as $dataKey ) {
            if ( false === $this->isStorableProperty( $dataKey ) ) {
                throw new \RuntimeException( $dataKey .' is not saveable' );
            }
            $tableList[ $this->getTableFromProperty($dataKey) ][ $dataKey ] = $dataObject->getProperty( $dataKey );
        }
        
        foreach ( $tableList as $tableKey=>$tableData ) {
            
            $where = array();
            
            foreach ( $this->getTablePrimaryKeys($tableKey) as $primaryKey ) {
                $where[ $primaryKey ] = $dataObject->get( $primaryKey );
            }
            
            
            $sql = sprintf( 'UPDATE `%1$s` SET %2$s WHERE %3$s',
                            $this->getTableName($tableKey),
                            $this->implodeDateWithFormartString($tableData),
                            $this->implodeDateWithFormartString($where, ' AND ')
                            );
            echo $sql;
        }
        
        
        
    }
    public function implodeDateWithFormartString( &$data, $seperator = ', ', $format = '`%1$s` = "%2$s"' ) {
        $return ="";
        foreach ( $data as $fieldName => &$value ){
            $return .= ( $return != "" ) ? $seperator : ''
                     . sprintf( $format,
                                $fieldName,
                                $value );
        }
        return $return;
    }
    public function getStorableProperties () {
        return array_keys( $this->_config['property'] );
    }
    public function isStorableProperty ($propertyName) {
        return isset( $this->_config['property'][ $propertyName ] );
    }
    public function getTableFromProperty ($propertyName) {
        return $this->_config['property'][ $propertyName ]['db.table'];
    }
    public function getTableName ($tableKey) {
        return $this->_config['option']['db.table'][ $tableKey ]['name'];
    }
    public function getTablePrimaryKeys ($tableKey) {
        return $this->_config['option']['db.table'][ $tableKey ]['primary'];
    }
}