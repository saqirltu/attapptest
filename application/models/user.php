<?php
class Default_Model_User {
	protected $id;
	protected $password;
	protected $name;
	protected $role;
	protected $score;
	
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getPassword() {
		return $this->password;
	}

	public function setPassword($password) {
		$this->password = $password;
	}

	public function getName() {
		return $this->name;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function getRole() {
		return $this->role;
	}

	public function setRole($role) {
		$this->role = $role;
	}

	public function getScore() {
		return $this->score;
	}

	public function setScore($score) {
		$this->score = $score;
	}
}