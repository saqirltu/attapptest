<?php

class IndexController extends Zend_Controller_Action {
	
	public function init() {
		/* Initialize action controller here */
		$this->_helper->layout->disableLayout();
		
	}
	
	public function indexAction() {
		// action body
		if (!isset($_SESSION)) {
        	session_start();
        }
		if (isset($_SESSION['user'])) {
			$this->_redirect('pointq');
		}
		
		//Regular expression test
//		$subject1 = "57.645833° N 11.959333° E";
//    	$subject2 = "  57.645833 ,  11.959333  ";
    	$subject3 = "  57.7283722  11.8610609  ";
//    	$pattern1 = '/^(-?\d{1,3}\.\d{2,8})°?\s*[NnSs]\s*(-?\d{1,3}\.\d{2,8})°?\s*[EeWw]\s*$/';
		$pattern2 = '/^\s*(-?\d{1,3}\.\d{2,8})\s*,?\s*(-?\d{1,3}\.\d{2,8})\s*$/';
//		$pattern = '/^(\s*(-?\d{1,3}\.\d{2,8})\s*°\s*[NnSs]?\s*,?\s*(-?\d{1,3}\.\d{2,8})\s*°\s*[EeWw]?\s*)|(\s*(-?\d{1,3}\.\d{2,8})\s*,?\s*(-?\d{1,3}\.\d{2,8})\s*)$/';
//		if(preg_match($pattern, $subject1, $matches) == 0){
//			echo "<script language='javascript'>alert('Goe coordinates INCORRECT format :P');</script>";			
//			return;
//		}
//		print_r($matches);
//		echo "<br>";
//		if(preg_match($pattern, $subject2, $matches) == 0){
//			echo "<script language='javascript'>alert('Goe coordinates INCORRECT format :P');</script>";			
//			return;
//		}
//		print_r($matches);
//		echo "<br>";
		if(preg_match($pattern2, $subject3, $matches) == 0){
			echo "<script language='javascript'>alert('Goe coordinates INCORRECT format :P');</script>";			
			return;
		}
//		print_r($matches);
//		return;
	}
	
	public function loginAction() {
		$this->render('index');
		
		if ($_POST ['username'] == NULL) {
			echo "<font color='red'>Username should not be empty :P</font>";
			return;
		}
		if ($_POST ['password'] == NULL) {
			echo "<font color='red'>Password should not be empty :P</font>";
			return;
		}
		
		$userTB = new Default_Model_UserMapper();

		
/*		login check function*/
		$user = $userTB->getEntity($_POST['username']);
		if ($user === null || $user->getPassword () != $_POST ['password'] || $user->getRole () != $_POST ['role']) {
			echo "<font color='red'>Wrong username and password :(</font>";
			return;
		} else {
			session_start ();
			$_SESSION ['user'] = $user;
			$this->_redirect ( 'pointq' );
		}
		
		$this->_redirect ( 'index' );
	}
	
	public function logoutAction() {
		$this->_helper->viewRenderer->setNoRender ();
		session_start ();
		unset ( $_SESSION ['user'] );
		// redirect to login page
		$this->_redirect ( 'index' );
	}

}

