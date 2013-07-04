<?php

class Default_Model_PointMapper {
    protected $table;
    
    // construct function
	public function __construct() {
		$this->table = new Default_Model_DbTable_Point();
	}
	
	// insert into user values($row);
    public function insert($row) {
    	// insert if it is new, otherwize just returen the pointID
//    	$select  = $this->table->select()->where('triLat = $row[0] AND triLong = $row[1]');   	
    	
    	$tbAdapter = $this->table->getAdapter();
		
		$where = $tbAdapter->quoteInto('triLat = ?', $row['triLat'])
		       . $tbAdapter->quoteInto('and triLong = ?', $row['triLong']);
		
		$select = $this->table->fetchRow($where);
		
		if ($select == NULL) {
			return $this->table->insert ( $row );
		} else {
			return $select->id;
		}  	
    }
    
    public function getLatest($count) {
    	
		$db = $this->table->getAdapter();
		$entries = array();

		$where = null;
		$order = 'id DESC';
		$offset = null;
		$rowset = $this->table->fetchAll($where, $order, $count, $offset);

		foreach($rowset as $row) {
			$entry = new Default_Model_Point();
			$entry->setId($row->id);
			$entry->setTriLat($row->triLat);
			$entry->setTriLong($row->triLong);
			$entry->setQ1Lat($row->q1Lat);
			$entry->setQ1Long($row->q1Long);
			$entry->setQ2Lat($row->q2Lat);
			$entry->setQ2Long($row->q2Long);
			
            $entries[] = $entry;
		}
		return $entries;
    }
}