<?php

class LatestController extends Zend_Controller_Action
{

    public function init()
    {
        if (!isset($_SESSION)) {
        	session_start();
        }
		if (!isset($_SESSION['user'])) {
			$this->_redirect('index');
		}
    }

    public function indexAction()
    {
        // action body
        $this->view->recentUpload = array();
        
		$questionTable = new Default_Model_QuestionMapper();
		
		$this->view->recentUpload = $questionTable->getLatest(50);
    }

}

