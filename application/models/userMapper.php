<?php

class Default_Model_UserMapper {
    protected $table;
    
    // construct function
	public function __construct() {
		$dbTable = 'Default_Model_DbTable_User';
		$this->table = new $dbTable();
	}
	
	// recieve a id, and return the correspongding entity
	public function getEntity($t_id) {
		$row = $this->table->fetchRow('id = "'.$t_id.'"');
		if($row === null){
			return null;	
		} else {
			$ret = new Default_Model_User();
			$ret->setId($row->id);
			$ret->setPassword($row->password);
			$ret->setName($row->name);
			$ret->setRole($row->role);
			return $ret;
		}
	}
	
	// recieve the id and the data you want to update, and update the info
	public function update($id, $set) {
		$ret = $this->getEntity($id);
		if ($ret == null) {
			echo 'user '.$id.' does not exist'.'<br />';
			return;
		}
		$db = $this->table->getAdapter();
		$where = $db->quoteInto('id = ?', $id);
		$rows_affected = $this->table->update($set, $where);
	}
	
	// insert the data to the db_user
	// insert into user values($row);
    public function insert($row) {
   		$ret = $this->getEntity($row['id']);
   		if ($ret != null) {
   			echo 'user '.$row['id'].' already exist !!!'.'<br />';
   			return;
   		}
    	$this->table->insert($row);
    }
    
    // delete the corresponding row for id
    // delete from user where id = $id;
    public function delete($id) {
    	$ret = $this->getEntity($id);
    	if ($ret == null) {
    		echo 'user '.$id.' does not exist !!!'.'<br />';
    		return;
    	}
    	$db = $this->table->getAdapter();
		$where = $db->quoteInto('id = ?', $id);
		$this->table->delete($where);
    }
}
