<?php

class RegionqController extends Zend_Controller_Action
{
	
	public function init() {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		//user control, commented when test
		if (! isset ( $_SESSION ['user'] )) {
			$this->_redirect ( 'index' );
		}
		if (!isset ( $_SESSION ['region'] )){
			$_SESSION ['region'] = NULL;
		}
		
		$this->view->regions = array ();
		
		$regionTable = new Default_Model_RegionMapper ();
		
		$this->view->regions = $regionTable->getAll ();
		
		$this->view->latest = array();
        
		$qRegionTB = new Default_Model_QregionMapper();
		
		$this->view->latest = $qRegionTB->getLatest(1);
	}

    public function indexAction()
    {
    	
    }
    
	public function saveAction() {
		if (!isset($_SESSION)) {
        	session_start();
        }
		
		$_SESSION ['region'] = $_POST ['regionID'];
		
		$this->render('index');
		
		if($_POST ['regionID'] == NULL){
			echo "<script language='javascript'>alert('You need to specify the region first :P');</script>";			
			return;
		}		
		if ($_POST ['qEn'] == NULL || $_POST ['aEn']==NULL || $_POST ['bEn']==NULL || $_POST ['cEn']==NULL || $_POST ['dEn']==NULL) {
			echo "<script language='javascript'>alert('Question in English not complete :P');</script>";			
			return;
		}
		if ($_POST ['qSv'] == NULL || $_POST ['aSv']==NULL || $_POST ['bSv']==NULL || $_POST ['cSv']==NULL || $_POST ['dSv']==NULL) {
			echo "<script language='javascript'>alert('Question in Swedish not complete :P');</script>";			
			return;
		}
		if ($_POST ['sol'] == 0 || $_POST ['score']==0) {
			echo "<script language='javascript'>alert('Score or Solution not complete :P');</script>";			
			return;
		}
		
		
		$regionID = $_POST ['regionID'];
		$qEn = $_POST ['qEn'];
		$aEn = $_POST ['aEn'];
		$bEn = $_POST ['bEn'];
		$cEn = $_POST ['cEn'];
		$dEn = $_POST ['dEn'];
		$exInfoEn = $_POST ['exInfoEn'];
		$qSv = $_POST ['qSv'];
		$aSv = $_POST ['aSv'];
		$bSv = $_POST ['bSv'];
		$cSv = $_POST ['cSv'];
		$dSv = $_POST ['dSv'];
		$exInfoSv = $_POST ['exInfoSv'];
		$sol = $_POST ['sol'];
		$score = $_POST ['score'];
		$category = $_POST ['category'];		 		 
		
		$qRegionRow = array (
			'regionID'=>$regionID,
			'qEn'=>$qEn,
	    	'aEn'=>$aEn,
			'bEn'=>$bEn,
			'cEn'=>$cEn,
	    	'dEn'=>$dEn,
			'exInfoEn'=>$exInfoEn,
			'qSv'=>$qSv,
			'aSv'=>$aSv,
	    	'bSv'=>$bSv,
			'cSv'=>$cSv,
			'dSv'=>$dSv,
			'exInfoSv'=>$exInfoSv,
	    	'sol'=>$sol,
			'score'=>$score,
			'category'=>$category
		);
		
		
		$qRegionTB = new Default_Model_QregionMapper ();
		$qRegionID = $qRegionTB->insert($qRegionRow);
		
		
		echo "<script language='javascript'>alert('Question ".$qRegionID." is Collected!'); location.href = 'index';</script>";
		return;
	}

}
