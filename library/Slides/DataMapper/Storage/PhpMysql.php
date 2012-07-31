<?php

namespace Slides\DataMapper\Storage;

class PhpMysql
    extends AbstractStorage {
    
    protected $_config= null;
    protected $_dbLink = null;

    public function setConfig ( $storageOptions ) {
        $this->_config = $storageOptions;
    }
    public function init() {
        $this->dbLink = mysql_connect( $this->_config['option']['db.host'],
                                       $this->_config['option']['db.user'],
                                       $this->_config['option']['db.password'] );
        mysql_select_db( $this->_config['option']['db.dbname'], $this->dbLink );
    }
}