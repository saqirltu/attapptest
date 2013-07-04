<?php

class Default_Model_QuestionMapper {
    protected $table;
    protected $lastID;
    
    // construct function
	public function __construct() {
//		$dbTable = 'Default_Model_DbTable_Question';
		$this->table = new Default_Model_DbTable_Question();
	}
	// insert the data to the db_user
	// insert into user values($row);
    public function insert($row) {
    	$this->lastID = $this->table->insert($row);
    }

    public function allocateID(){    	
    	return $this->lastID+1;
    }
    
    public function getLastQuestion(){
    	return "{$this->lastID}";
    	
//		$row = $this->table->fetchRow("id = ".$this->lastID);
//		if($row === null){
//			return $this->lastID;	
//		} else {
//			return $row->qEn;
//		}
    }
    
    public function getLatest($count) {
    	
		$db = $this->table->getAdapter();
		$entries = array();

		$where = null;
		$order = 'id DESC';
		$offset = null;
		$rowset = $this->table->fetchAll($where, $order, $count, $offset);

		foreach($rowset as $row) {
			$entry = new Default_Model_Question();
			$entry->setId($row->id);
			$entry->setTriLat($row->triLat);
			$entry->setTriLong($row->triLong);
			$entry->setQ1Lat($row->q1Lat);
			$entry->setQ1Long($row->q1Long);
			$entry->setQ2Lat($row->q2Lat);
			$entry->setQ2Long($row->q2Long);
			$entry->setQEn($row->qEn);
			$entry->setAEn($row->aEn);
			$entry->setBEn($row->bEn);
			$entry->setCEn($row->cEn);
			$entry->setDEn($row->dEn);
			$entry->setQSv($row->qSv);
			$entry->setASv($row->aSv);
			$entry->setBSv($row->bSv);
			$entry->setCSv($row->cSv);
			$entry->setDSv($row->dSv);
			$entry->setSol($row->sol);
			$entry->setScore($row->score);
			$entry->setExInfoEn($row->exInfoEn);
			$entry->setExInfoSv($row->exInfoSv);
			$entry->setCategory($row->category);
			$entry->setRoad($row->road);
			
            $entries[] = $entry;
		}
		return $entries;
    }
}