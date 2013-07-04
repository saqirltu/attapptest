<?php

class Default_Model_Point {
	protected $id;
	protected $triLat;
	protected $triLong;
	protected $q1Lat;
	protected $q1Long;
	protected $q2Lat;
	protected $q2Long;
	
	public function getId() {
		return $this->id;
	}

	public function getTriLat() {
		return $this->triLat;
	}

	public function getTriLong() {
		return $this->triLong;
	}

	public function getQ1Lat() {
		return $this->q1Lat;
	}

	public function getQ1Long() {
		return $this->q1Long;
	}

	public function getQ2Lat() {
		return $this->q2Lat;
	}

	public function getQ2Long() {
		return $this->q2Long;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setTriLat($triLat) {
		$this->triLat = $triLat;
	}

	public function setTriLong($triLong) {
		$this->triLong = $triLong;
	}

	public function setQ1Lat($q1Lat) {
		$this->q1Lat = $q1Lat;
	}

	public function setQ1Long($q1Long) {
		$this->q1Long = $q1Long;
	}

	public function setQ2Lat($q2Lat) {
		$this->q2Lat = $q2Lat;
	}

	public function setQ2Long($q2Long) {
		$this->q2Long = $q2Long;
	}


}