<?php

class Default_Model_Qregion {
	protected $id;
	protected $regionID;
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
	
	public function getId() {
		return $this->id;
	}

	public function getRegionID() {
		return $this->regionID;
	}

	public function getQEn() {
		return $this->qEn;
	}

	public function getAEn() {
		return $this->aEn;
	}

	public function getBEn() {
		return $this->bEn;
	}

	public function getCEn() {
		return $this->cEn;
	}

	public function getDEn() {
		return $this->dEn;
	}

	public function getQSv() {
		return $this->qSv;
	}

	public function getASv() {
		return $this->aSv;
	}

	public function getBSv() {
		return $this->bSv;
	}

	public function getCSv() {
		return $this->cSv;
	}

	public function getDSv() {
		return $this->dSv;
	}

	public function getSol() {
		return $this->sol;
	}

	public function getScore() {
		return $this->score;
	}

	public function getExInfoEn() {
		return $this->exInfoEn;
	}

	public function getExInfoSv() {
		return $this->exInfoSv;
	}

	public function getCategory() {
		return $this->category;
	}

	public function setId($id) {
		$this->id = $id;
	}

	public function setRegionID($regionID) {
		$this->regionID = $regionID;
	}

	public function setQEn($qEn) {
		$this->qEn = $qEn;
	}

	public function setAEn($aEn) {
		$this->aEn = $aEn;
	}

	public function setBEn($bEn) {
		$this->bEn = $bEn;
	}

	public function setCEn($cEn) {
		$this->cEn = $cEn;
	}

	public function setDEn($dEn) {
		$this->dEn = $dEn;
	}

	public function setQSv($qSv) {
		$this->qSv = $qSv;
	}

	public function setASv($aSv) {
		$this->aSv = $aSv;
	}

	public function setBSv($bSv) {
		$this->bSv = $bSv;
	}

	public function setCSv($cSv) {
		$this->cSv = $cSv;
	}

	public function setDSv($dSv) {
		$this->dSv = $dSv;
	}

	public function setSol($sol) {
		$this->sol = $sol;
	}

	public function setScore($score) {
		$this->score = $score;
	}

	public function setExInfoEn($exInfoEn) {
		$this->exInfoEn = $exInfoEn;
	}

	public function setExInfoSv($exInfoSv) {
		$this->exInfoSv = $exInfoSv;
	}

	public function setCategory($category) {
		$this->category = $category;
	}

	
	

}