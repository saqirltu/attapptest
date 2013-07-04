<?php

class Default_Model_Region {
	protected $id;
	protected $name;
	protected $cLat;
	protected $cLong;
	protected $radius;
	
	public function getId() {
		return $this->id;
	}

	public function getName() {
		return $this->name;
	}

	public function getCLat() {
		return $this->cLat;
	}

	public function getCLong() {
		return $this->cLong;
	}

	public function getRadius() {
		return $this->radius;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setName($name) {
		$this->name = $name;
	}

	public function setCLat($cLat) {
		$this->cLat = $cLat;
	}

	public function setCLong($cLong) {
		$this->cLong = $cLong;
	}

	public function setRadius($radius) {
		$this->radius = $radius;
	}
	
	
}