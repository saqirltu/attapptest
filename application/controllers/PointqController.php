<?php

class PointqController extends Zend_Controller_Action
{
	
	public function init() {
		if (! isset ( $_SESSION )) {
			session_start ();
		}
		//user control, commented when test
		if (! isset ( $_SESSION ['user'] )) {
			$this->_redirect ( 'index' );
		}
		if (! isset ( $_SESSION ['keepPoint'] )) {
			$_SESSION ['keepPoint'] = NULL;
		}
		if (! isset ( $_SESSION ['triPoint'] )) {
			$_SESSION ['triPoint'] = NULL;
		}
		if (! isset ( $_SESSION ['q1Point'] )) {
			$_SESSION ['q1Point'] = NULL;
		}
		if (! isset ( $_SESSION ['q2Point'] )) {
			$_SESSION ['q2Point'] = NULL;
		}
		
		$this->view->latest = array();
        
		$qPointTB = new Default_Model_QpointMapper();
		
		$this->view->latest = $qPointTB->getLatest(1);
	}

    public function indexAction()
    {        
    	
    }
    
	public function saveAction() {
		
		$this->render('index');
		
		
		if ($_POST ['triPoint'] == NULL || $_POST ['q1Point'] == NULL || $_POST ['q2Point'] == NULL) {
			echo "<script language='javascript'>alert('Goe coordinates not complete :P');</script>";			
			return;
		}
		
		//Filter the formatted input coords
		$pattern = '/^\s*(-?\d{1,3}\.\d{2,8})\s*,?\s*(-?\d{1,3}\.\d{2,8})\s*$/';
		
		if (preg_match ( $pattern, $_POST ['triPoint'], $matches ) == 0) {
			echo "<script language='javascript'>alert('Goe coordinates INCORRECT format :P');</script>";
			return;
		}
		$triLat = (double)$matches[1];
		$triLong = (double)$matches[2];
		
		
		
		if (preg_match ( $pattern, $_POST ['q1Point'], $matches ) == 0) {
			echo "<script language='javascript'>alert('Goe coordinates INCORRECT format :P');</script>";
			return;
		}
		$q1Lat = (double)$matches[1];
		$q1Long = (double)$matches[2];
		
		if (preg_match ( $pattern, $_POST ['q2Point'], $matches ) == 0) {
			echo "<script language='javascript'>alert('Goe coordinates INCORRECT format :P');</script>";
			return;
		}
		$q2Lat = (double)$matches[1];
		$q2Long = (double)$matches[2];
		
		
		
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

		$pointRow = array (
			'triLat'=>$triLat,
	    	'triLong'=>$triLong,
			'q1Lat'=>$q1Lat,
			'q1Long'=>$q1Long,
	    	'q2Lat'=>$q2Lat,
			'q2Long'=>$q2Long
		);
		
		$pointTB = new Default_Model_PointMapper ();
				
		$pointID = $pointTB->insert($pointRow);
		
		
		$apply = $_POST ['apply'];
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
										
		
		$qPointRow = array (
			'pointID'=>$pointID,
			'apply'=>$apply,
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
		
		
		$qPointTB = new Default_Model_QpointMapper ();
		
		$qPointID = $qPointTB->insert($qPointRow);

		
//		Keep point operations
		if (isset ( $_POST ['keepPoint'] )) {
			if (! isset ( $_SESSION )) {
				session_start ();
			}
			$_SESSION ['keepPoint'] = $_POST ['keepPoint'];
			$_SESSION ['triPoint'] = $_POST ['triPoint'];
			$_SESSION ['q1Point'] = $_POST ['q1Point'];
			$_SESSION ['q2Point'] = $_POST ['q2Point'];
		} 
		else{
			if (! isset ( $_SESSION )) {
				session_start ();
			}
			unset ( $_SESSION ['keepPoint'] );
			unset ( $_SESSION ['triPoint'] );
			unset ( $_SESSION ['q1Point'] );
			unset ( $_SESSION ['q2Point'] );
		}
		
		echo "<script language='javascript'>alert('Question ".$qPointID." is successfully collected on Point ".$pointID." :D '); location.href = 'index';</script>";
		return;
	}

}
