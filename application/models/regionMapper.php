<?php

class Default_Model_RegionMapper {
    protected $table;
    
    // construct function
	public function __construct() {
		$this->table = new Default_Model_DbTable_Region();
	}
	
	// insert into user values($row);
    public function insert($row) {
    	$this->table->insert($row);
    }
    
    public function getAll() {
    	
		$db = $this->table->getAdapter();
		$entries = array();
		
		$order = 'id ASC';//if increasing is not default, use this
		
		$rowset = $this->table->fetchAll();

		foreach($rowset as $row) {
			$entry = new Default_Model_Region();
			$entry->setId($row->id);
			$entry->setName($row->name);
			$entry->setCLat($row->cLat);
			$entry->setCLong($row->cLong);
			$entry->setRadius($row->radius);
			
            $entries[] = $entry;
		}
		return $entries;
    }
}