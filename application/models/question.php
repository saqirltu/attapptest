<?php

class Default_Model_Question {
	protected $id;
	protected $triLat;
	protected $triLong;
	protected $q1Lat;
	protected $q1Long;
	protected $q2Lat;
	protected $q2Long;
	protected $qEn;
	protected $aEn;
	protected $bEn;
	protected $cEn;
	protected $dEn;
	protected $qSv;
	protected $aSv;
	protected $bSv;
	protected $cSv;
	protected $dSv;
	protected $sol;
	protected $score;
	protected $exInfoEn;
	protected $exInfoSv;
	protected $category;
	protected $road;
	
	public function getId() {
		return $this->id;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function getTriLat() {
		return $this->triLat;
	}

	public function setTriLat($triLat) {
		$this->triLat = $triLat;
	}

	public function getTriLong() {
		return $this->triLong;
	}

	public function setTriLong($triLong) {
		$this->triLong = $triLong;
	}

	public function getQ1Lat() {
		return $this->q1Lat;
	}

	public function setQ1Lat($q1Lat) {
		$this->q1Lat = $q1Lat;
	}

	public function getQ1Long() {
		return $this->q1Long;
	}

	public function setQ1Long($q1Long) {
		$this->q1Long = $q1Long;
	}

	public function getQ2Lat() {
		return $this->q2Lat;
	}

	public function setQ2Lat($q2Lat) {
		$this->q2Lat = $q2Lat;
	}

	public function getQ2Long() {
		return $this->q2Long;
	}

	public function setQ2Long($q2Long) {
		$this->q2Long = $q2Long;
	}

	public function getQEn() {
		return $this->qEn;
	}

	public function setQEn($qEn) {
		$this->qEn = $qEn;
	}

	public function getAEn() {
		return $this->aEn;
	}

	public function setAEn($aEn) {
		$this->aEn = $aEn;
	}

	public function getBEn() {
		return $this->bEn;
	}

	public function setBEn($bEn) {
		$this->bEn = $bEn;
	}

	public function getCEn() {
		return $this->cEn;
	}

	public function setCEn($cEn) {
		$this->cEn = $cEn;
	}

	public function getDEn() {
		return $this->dEn;
	}

	public function setDEn($dEn) {
		$this->dEn = $dEn;
	}

	public function getQSv() {
		return $this->qSv;
	}

	public function setQSv($qSv) {
		$this->qSv = $qSv;
	}

	public function getASv() {
		return $this->aSv;
	}

	public function setASv($aSv) {
		$this->aSv = $aSv;
	}

	public function getBSv() {
		return $this->bSv;
	}

	public function setBSv($bSv) {
		$this->bSv = $bSv;
	}

	public function getCSv() {
		return $this->cSv;
	}

	public function setCSv($cSv) {
		$this->cSv = $cSv;
	}

	public function getDSv() {
		return $this->dSv;
	}

	public function setDSv($dSv) {
		$this->dSv = $dSv;
	}

	public function getSol() {
		return $this->sol;
	}

	public function setSol($sol) {
		$this->sol = $sol;
	}

	public function getScore() {
		return $this->score;
	}

	public function setScore($score) {
		$this->score = $score;
	}

	public function getExInfoEn() {
		return $this->exInfoEn;
	}

	public function setExInfoEn($exInfoEn) {
		$this->exInfoEn = $exInfoEn;
	}

	public function getExInfoSv() {
		return $this->exInfoSv;
	}

	public function setExInfoSv($exInfoSv) {
		$this->exInfoSv = $exInfoSv;
	}

	public function getCategory() {
		return $this->category;
	}

	public function setCategory($category) {
		$this->category = $category;
	}

	public function getRoad() {
		return $this->road;
	}

	public function setRoad($road) {
		$this->road = $road;
	}


}