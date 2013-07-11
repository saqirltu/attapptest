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
		
//		if($_POST ['regionID'] == NULL){
//			echo "<script language='javascript'>alert('You need to specify the region first :P');</script>";			
//			return;
//		}		
//		if ($_POST ['qEn'] == NULL || $_POST ['aEn']==NULL || $_POST ['bEn']==NULL || $_POST ['cEn']==NULL || $_POST ['dEn']==NULL) {
//			echo "<script language='javascript'>alert('Question in English not complete :P');</script>";			
//			return;
//		}
//		if ($_POST ['qSv'] == NULL || $_POST ['aSv']==NULL || $_POST ['bSv']==NULL || $_POST ['cSv']==NULL || $_POST ['dSv']==NULL) {
//			echo "<script language='javascript'>alert('Question in Swedish not complete :P');</script>";			
//			return;
//		}
//		if ($_POST ['sol'] == 0 || $_POST ['score']==0) {
//			echo "<script language='javascript'>alert('Score or Solution not complete :P');</script>";			
//			return;
//		}
		
		
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
		
		
		//		//for test only
//
//		var_dump($_FILES);
//		
//		echo "Name: " . $_FILES ["file"] ["name"] . "<br>";
//		echo "Type: " . $_FILES ["file"] ["type"] . "<br>";
//		echo "Size: " . ($_FILES ["file"] ["size"] / 1024) . " kB<br>";
//		echo "Temp in: " . $_FILES ["file"] ["tmp_name"];
		
		
		$allowedExts = array ("gif", "jpeg", "jpg", "png" );
		$temp = explode ( ".", $_FILES ["pic"] ["name"] );
		$extension = strtolower(end ( $temp ));
		
		$info = "";		
		
		if ((($_FILES ["pic"] ["type"] == "image/gif") || ($_FILES ["pic"] ["type"] == "image/jpeg") || ($_FILES ["pic"] ["type"] == "image/jpg") || ($_FILES ["pic"] ["type"] == "image/pjpeg") || ($_FILES ["pic"] ["type"] == "image/x-png") || ($_FILES ["pic"] ["type"] == "image/png"))&&in_array($extension, $allowedExts) ) {
			
			if($_FILES ["pic"] ["size"] > 5242880){
				$info .= "Failed to upload the file: only file smaller than 5MB is accepted";				
			}
			
			else if ($_FILES ["pic"] ["error"] > 0) {
				$info .= "Failed to upload the file: unknown error -> " . $_FILES ["pic"] ["error"] . "<br>";
			} else {
				if(move_uploaded_file ( $_FILES ["pic"] ["tmp_name"], "images/R" . $qRegionID . "." . $extension )){
					
				} else{
					$info .= "Failed to upload the file: Upload error! But why??";
				}
			}
			
		} 
		else {
			$info .= "Failed to upload the file: Invalid file type";
		}
		
		
		echo "<script language='javascript'>alert('Question ".$qRegionID." is successfully collected\\n\\n".$info."'); location.href = 'index';</script>";
		
	}

}
