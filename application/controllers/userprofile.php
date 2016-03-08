<?php
class Userprofile extends CI_Controller {
	var $pgToLoad;
	
	public function __construct() {
		parent::__construct();
		#this will start the session
		session_start();
		
		if(!isset($_SESSION['userId']) || !isset($_SESSION['userLevel']) || !isset($_SESSION['employeeid']) || !isset($_SESSION['firstname']) || !isset($_SESSION['lastname'])) {
			redirect('home', 'location');
		}
		
		#this will load the model
		$this->load->model('Contents');
		
		#get last uri segment to determine which content to load
		$continue = true;
		$i = 0;
		do {
			$i++;
			if ($this->uri->segment($i) != "") $this->pgToLoad = $this->uri->segment($i);
			else $continue = false;				
		} while ($continue);		
	}

	public function index() {		
		$this->main();
	}	
	
	public function main() {
		#set default content to load 
		$this->pgToLoad = empty($this->pgToLoad) ? "userprofile" : $this->pgToLoad;
		$disMsg = "";
		
		#this will delete the record selected
		if($this->uri->segment(2) == 'delete') { 
			$this->deleteRecord();
		}
		
		#this will check if the post value is trigger
		if(isset($_POST['addnew'])) {
			$this->addRecord();	
		}					
		
		#this will check if the post value is trigger
		if(isset($_POST['saveinfo'])) {
			$this->updateinfo();	
		}						
		
		#this will display the account details of the user	
		$this->displayForm();
		
		#this will logout the user and redirect to the page
		if($this->uri->segment(2) == 'logout') {
			session_destroy();
			redirect('home', 'location');
		}					
		
		$data = array ( 'pageTitle' => 'Glacier Payroll | ADMINISTRATION',
						'disMsg'	=> $disMsg,												
						'mainCont'	=> $this->mainCont );
		
		$this->load->view('mainTpl', $data, FALSE);
	}

	#this will display the form when editing the product
	public function displayForm() {
		$data['level'] = $this->Contents->exeGetUserLevel();	
		$data['employee'] = $this->Contents->exeGetEmpToEdit($_SESSION['userId']);
		$data['emp'] = $this->Contents->exeGetEmpToEdit($_SESSION['userId']);
		$data['info'] = $this->Contents->exeGetUserInfo($_SESSION['userId']);	
		$this->mainCont = $this->load->view('pages/empform', $data, TRUE);			
	}

	#this will display the form when editing the product
	public function updateInfo() {
		if(empty($_POST['fname']) || empty($_POST['mname']) || empty($_POST['lname']) || empty($_POST['emailadd']) || empty($_POST['gender'])) {	
			$disMsg = "Please fill up the form completely.";
			$_SESSION['disMsg'] = $disMsg;	
		} else {
			$saveinfo = $this->Contents->exeSaveUserInfo($_SESSION['userId']);
			
			if($saveinfo['affRows'] > 0) {
				$success = "Employee information has been save.";
				$_SESSION['success'] = $success;	
				redirect($this->uri->segment(1), 'location');			
			} else {
				$disMsg = "Unable to save information.";
			}		
		}			
	}

	#this will delete the employees record
	public function deleteRecord() {		
		$delete = $this->Contents->exeDeleteRecord($this->uri->segment(3));		
			
		if($delete['affRows'] > 0) {
			$_SESSION['success'] = "Employee record has been deleted.";
			redirect('employees', 'location');			
		} else {
			$disMsg = "Unable to delete the employee record.";
		}			
		$this->mainCont = $this->load->view('pages/employees', $data, TRUE);		 	
	}
	
	public function _remap () {
		$this->main();
	
		// load model
		//$this->load->model('Contents');	
	
		// check if subsection exists
		/*$subSection = $this->Contents->checkNav($this->pgToLoad);
		if ($subSection) {
			// show the content for the subsection
			$this->main();		
		} else {
			// show a 404 error if subsection does not exist
			show_404();
		}*/
	}
}
?>