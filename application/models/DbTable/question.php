<?php

class Default_Model_DbTable_Question extends Zend_Db_Table_Abstract {
	protected $_name = 'question';
    protected $_primary = 'id'; 
    
    public function getNewId(){
    	return $this->_db->lastInsertId();
    }
}

