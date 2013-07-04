<?php

class Default_Model_QpointMapper {
    protected $table;
    
    // construct function
	public function __construct() {
		$this->table = new Default_Model_DbTable_Qpoint();
	}
	
	// insert into user values($row);
    public function insert($row) {
    	return $this->table->insert($row);
    }

    
    public function getLatest($count) {
    	
		$db = $this->table->getAdapter();
		$entries = array();

		$where = null;
		$order = 'id DESC';
		$offset = null;
		$rowset = $this->table->fetchAll($where, $order, $count, $offset);

		foreach($rowset as $row) {
			$entry = new Default_Model_Qpoint();
			$entry->setId($row->id);
			$entry->setPointID($row->pointID);
			$entry->setApply($row->apply);
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
			
            $entries[] = $entry;
		}
		return $entries;
    }
}