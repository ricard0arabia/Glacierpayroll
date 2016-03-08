<?php
class Contents extends CI_Model {
	
	#build constructor
	function __construct() {
		parent::__construct();
	}		
	
	function contents () {	
		parent::CI_Model();
		$this->db = $this->load->database();
	}

	function add_image($data) {
		$this->db->insert('uploads',$data);
	}
	
	#this will get the user to login
	function getLogin() {
		$exeLogin = $this->db->query("SELECT * 
									FROM employees 
									WHERE status 	= 1								
									AND employeeid 	= '". mysql_real_escape_string($this->input->post('employeeid')) ."'
									AND emp_pass 		= '". mysql_real_escape_string(md5($this->input->post('userpass'))) ."' ");									

		if($exeLogin->num_rows() > 0) {
			return $exeLogin->result_array();
		} else {
			return false;		
		}
	}
	
	#this will update the user account
	function exeUpdateAccount($userId) {			
		$exeUpdateAcct = $this->db->query("UPDATE tbl_user a, tbl_user_details b
									SET	a.sssid			= '". mysql_real_escape_string(ucwords($_POST['sssId'])) ."',
										a.email_address	= '". mysql_real_escape_string($_POST['emailAdd']) ."',		
										a.firstname 		= '". mysql_real_escape_string(ucwords($_POST['fname'])) ."',
										a.middlename 		= '". mysql_real_escape_string(ucwords($_POST['mname'])) ."', 	
										a.lastname 		= '". mysql_real_escape_string(ucwords($_POST['lname'])) ."',
										a.modify_date		= '". date_default_timezone_set('America/New_York') ."',		
										a.modify_user_id	= '". mysql_real_escape_string($_SESSION['userId']) ."',
										b.birthdate 		= '". mysql_real_escape_string($_POST['birthYear']) ."',
										b.gender			= '". mysql_real_escape_string($_POST['gender']) ."',										
										b.civil_status	= '". mysql_real_escape_string($_POST['cStatus']) ."',
										b.cmpy_name		= '". mysql_real_escape_string($_POST['cmpyName']) ."',
										b.job_title 		= '". mysql_real_escape_string($_POST['jobTitle']) ."',
										b.country_name 	= '". mysql_real_escape_string($_POST['ctryName']) ."',													
										b.home_address	= '". mysql_real_escape_string($_POST['addr1']) ."',											
										b.city_name 		= '". mysql_real_escape_string($_POST['cityName']) ."',
										b.zipcode			= '". mysql_real_escape_string($_POST['zipCode']) ."',
										b.country_name	= '". mysql_real_escape_string($_POST['ctryName']) ."',																		
										b.office_telno 	= '". mysql_real_escape_string($_POST['officeNo']) ."',
										b.mobile_no 		= '". mysql_real_escape_string($_POST['mobileNo']) ."',	
										b.landline_no		= '". mysql_real_escape_string($_POST['phone1']) ."',									
										b.modify_date		= '". date_default_timezone_set('America/New_York') ."',								
										b.modify_user_id	= '". mysql_real_escape_string($_SESSION['userId']) ."'	
										b.cstatus 	= '". mysql_real_escape_string($_POST['civilStatus']) ."',

										b.department 	= '". mysql_real_escape_string($_POST['department']) ."',
										b.contact_no 	= '". mysql_real_escape_string($_POST['contact_no']) ."',

										b.hdmf_no 	= '". mysql_real_escape_string($_POST['hdmf_no']) ."',
										b.tin_no 	= '". mysql_real_escape_string($_POST['tin_no']) ."',
										b.sss_no 	= '". mysql_real_escape_string($_POST['sss_no']) ."',
										b.philhealth_no 	= '". mysql_real_escape_string($_POST['philhealth_no'])."'
										
									WHERE a.user_id  		= ". mysql_real_escape_string($userId) ." AND b.user_id  = ". mysql_real_escape_string($userId) ." ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}
	
	#this will update the password
	function exeUpdatePassword($userId) {
		$exeUpdatePassword = $this->db->query("UPDATE employees
									SET emp_pass 		= '". mysql_real_escape_string(md5($_POST['newPass'])) ."'								
									WHERE user_id		= '". mysql_real_escape_string($userId) ."' ");	
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will retrieve the total number of employees
	function exeGetTotalEmp() {		
		$exeGetTotalEmp = $this->db->query("SELECT *
										FROM employees
										WHERE status  = 1
										ORDER BY firstname ASC, lastname ASC");
										
		return $exeGetTotalEmp->num_rows();	
	}
	
	#this will retrieve the employees lists
	function exeGetAllEmployees() {
		$exeGetAllEmployees = $this->db->query("SELECT *
										FROM employees
										WHERE status  >= 0
										ORDER BY firstname ASC, lastname ASC");
										
		return $exeGetAllEmployees->result_array();
	}

	#this will retrieve the employee to update
	function exeGetEmpToEdit($userid) {
		$exeGetEmpToEdit = $this->db->query("SELECT *
										FROM employees a
										LEFT JOIN employee_details b
										ON a.user_id = b.user_id
										WHERE a.status >=0
										AND a.user_id  = '". $userid ."' ");
										
		if($exeGetEmpToEdit->num_rows() > 0) {
			return $exeGetEmpToEdit->result_array();
		} else {
			return false;
		}
	}

	#this will retrieve the user level
	function exeGetUserLevel() {
		$exeGetUserLevel = $this->db->query("SELECT *
										FROM userlevel										
										WHERE status = 1 ");
										
		if($exeGetUserLevel->num_rows() > 0) {
			return $exeGetUserLevel->result_array();
		} else {
			return false;
		}
	}
	function exeGetUserStatus() {
		$exeGetUserStatus = $this->db->query("SELECT *
										FROM emp_status	");
										
		if($exeGetUserStatus->num_rows() > 0) {
			return $exeGetUserStatus->result_array();
		} else {
			return false;
		}
	}

	function exeGetEmpDept() {
		$exeGetEmpDept = $this->db->query("SELECT *
										FROM department	");
										
		if($exeGetEmpDept->num_rows() > 0) {
			return $exeGetEmpDept->result_array();
		} else {
			return false;
		}
	}
	
	#this will retrieve the employees information
	function exeGetUserInfo($editId) {
		$exeGetUserInfo = $this->db->query("SELECT *
										FROM employee_details										
										WHERE user_id  = '". $editId ."' ");
										
		if($exeGetUserInfo->num_rows() > 0) {
			return $exeGetUserInfo->result_array();
		} else {
			return false;
		}
	}

	#this will add new record
	function exeAddNewRecord() {
		$exeaddrecord = $this->db->query("INSERT INTO employees
									SET	emailadd	= '". mysql_real_escape_string($_POST['emailadd']) ."',		
										firstname 	= '". mysql_real_escape_string(ucwords($_POST['fname'])) ."',
										middlename 	= '". mysql_real_escape_string(ucwords($_POST['mname'])) ."', 	
										lastname 	= '". mysql_real_escape_string(ucwords($_POST['lname'])) ."',
										userlevel	= ". mysql_real_escape_string($_POST['userLevel']) .",
										employeeid	= '". mysql_real_escape_string($_POST['empno']) ."',
										emp_pass	= '". mysql_real_escape_string(md5($_POST['empass'])) ."' ");

		$maxid = 0;
		$row = $this->db->query('SELECT MAX(user_id) AS maxid FROM employees')->row();
		if ($row) {
		    $maxid = $row->maxid; 
		}

		$exeaddrecord = $this->db->query("INSERT INTO employee_details 
									SET user_id 	= ". $maxid .",
										birthdate 	= '". mysql_real_escape_string($_POST['bdate']) ."',
										gender		= '". mysql_real_escape_string($_POST['gender']) ."',										
										jobtitle	= '". mysql_real_escape_string($_POST['jobtitle']) ."',
										datehired	= '". mysql_real_escape_string($_POST['datehired']) ."',
										salary 		= '". mysql_real_escape_string($_POST['salary']) ."',
										address 	= '". mysql_real_escape_string($_POST['address']) ."',
										incase_emergency 	= '". mysql_real_escape_string($_POST['contperson']) ."',
										emergency_no 	= '". mysql_real_escape_string($_POST['emernumber']) ."',
										cstatus 	= '". mysql_real_escape_string($_POST['civilStatus']) ."',
										department 	= '". mysql_real_escape_string($_POST['department']) ."',
										contact_no 	= '". mysql_real_escape_string($_POST['contact_no']) ."',
										hdmf_no 	= '". mysql_real_escape_string($_POST['hdmf_no']) ."',
										tin_no 	= '". mysql_real_escape_string($_POST['tin_no']) ."',
										sss_no 	= '". mysql_real_escape_string($_POST['sss_no']) ."',
										philhealth_no 	= '". mysql_real_escape_string($_POST['philhealth_no']) ."'										");

		$info = $this->db->query("SELECT * FROM employee_details WHERE user_id  = ". $maxid ." ");
	
		$info2 = $info->result_array();
		$salary = $info2[0]['salary'];
	
		$selcont = $this->db->query("SELECT employee
										FROM sss										
										WHERE min_salary  < ". $salary ." AND max_salary > ". $salary. " ");
	
		$selcont2 = $selcont->result_array();
		$ssscont = $selcont2[0]['employee'];
		
		$selcont3 = $this->db->query("SELECT employee
										FROM philhealth_table										
										WHERE min_salary  <= ". $salary ." AND max_salary > ". $salary. " ");
										
		$selcont4 = $selcont3->result_array();
		$philhealth = $selcont4[0]['employee'];
		
		$pagibig = $salary/2*.02;
		
		$check = $this->db->query("SELECT * FROM emp_contributions WHERE user_id  = ". $maxid ." ");
		if($check->num_rows() > 0) {
			return false;
		} else {
			$exeAddEmpContri = $this->db->query("INSERT INTO emp_contributions
										SET	user_id		= '". mysql_real_escape_string($maxid) ."',		
											sss 		= '". mysql_real_escape_string($ssscont) ."',
											philhealth 	= '". mysql_real_escape_string($philhealth) ."', 
											pagibig 	= '". mysql_real_escape_string($pagibig) ."', 
											status		= 1 ");
	
			$rsQuery['affRows'] = $this->db->affected_rows();
			return $rsQuery;
		}		
	}

	#this will save the employees information
	function exeSaveUserInfo($userId) {
		if($this->uri->segment(1) == 'userprofile') {
			$exeupdateinfo = $this->db->query("UPDATE employees a,employee_details b
									SET	a.emailadd		= '". mysql_real_escape_string($_POST['emailadd']) ."',		
										a.firstname 	= '". mysql_real_escape_string(ucwords($_POST['fname'])) ."',
										a.middlename 	= '". mysql_real_escape_string(ucwords($_POST['mname'])) ."', 	
										a.lastname 		= '". mysql_real_escape_string(ucwords($_POST['lname'])) ."',
										b.birthdate 	= '". mysql_real_escape_string($_POST['bdate']) ."',
										b.gender		= '". mysql_real_escape_string($_POST['gender']) ."',										
										b.jobtitle		= '". mysql_real_escape_string($_POST['jobtitle']) ."',
										b.address 		= '". mysql_real_escape_string($_POST['address']) ."',
										b.incase_emergency 	= '". mysql_real_escape_string($_POST['contperson']) ."',
										b.emergency_no 	= '". mysql_real_escape_string($_POST['emernumber']) ."',
										b.cstatus 	= '". mysql_real_escape_string($_POST['civilStatus']) ."',

										b.department 	= '". mysql_real_escape_string($_POST['department']) ."',
										b.contact_no 	= '". mysql_real_escape_string($_POST['contact_no']) ."',

										b.hdmf_no 	= '". mysql_real_escape_string($_POST['hdmf_no']) ."',
										b.tin_no 	= '". mysql_real_escape_string($_POST['tin_no']) ."',
										b.sss_no 	= '". mysql_real_escape_string($_POST['sss_no']) ."',
										b.philhealth_no 	= '". mysql_real_escape_string($_POST['philhealth_no'])."' 
									WHERE a.user_id  	= ". mysql_real_escape_string($userId) ." AND b.user_id = ". mysql_real_escape_string($userId) ."");
		} else {
			$exeupdateinfo = $this->db->query("UPDATE employees a,employee_details b
									SET	a.emailadd		= '". mysql_real_escape_string($_POST['emailadd']) ."',		
										a.firstname 	= '". mysql_real_escape_string(ucwords($_POST['fname'])) ."',
										a.middlename 	= '". mysql_real_escape_string(ucwords($_POST['mname'])) ."', 	
										a.lastname 		= '". mysql_real_escape_string(ucwords($_POST['lname'])) ."',
										a.userLevel     = ". mysql_real_escape_string($_POST['userLevel']) .",
										a.employeeid	= '". mysql_real_escape_string($_POST['empno']) ."',
										b.birthdate 	= '". mysql_real_escape_string($_POST['bdate']) ."',
										b.gender		= '". mysql_real_escape_string($_POST['gender']) ."',										
										b.jobtitle		= '". mysql_real_escape_string($_POST['jobtitle']) ."',
										b.datehired		= '". mysql_real_escape_string($_POST['datehired']) ."',
										b.salary 		= '". mysql_real_escape_string($_POST['salary']) ."',
										b.address 		= '". mysql_real_escape_string($_POST['address']) ."',
										b.incase_emergency 	= '". mysql_real_escape_string($_POST['contperson']) ."',
										b.emergency_no 	= '". mysql_real_escape_string($_POST['emernumber']) ."',
										b.cstatus 	= '". mysql_real_escape_string($_POST['civilStatus']) ."',

										b.department 	= '". mysql_real_escape_string($_POST['department']) ."',
										b.contact_no 	= '". mysql_real_escape_string($_POST['contact_no']) ."',
										b.hdmf_no 	= '". mysql_real_escape_string($_POST['hdmf_no']) ."',
										b.tin_no 	= '". mysql_real_escape_string($_POST['tin_no']) ."',
										b.sss_no 	= '". mysql_real_escape_string($_POST['sss_no']) ."',
										b.philhealth_no 	= '". mysql_real_escape_string($_POST['philhealth_no'])."'

									WHERE a.user_id  	= ". mysql_real_escape_string($userId) ." AND b.user_id = ". mysql_real_escape_string($userId) ."");	
									
				$info = $this->db->query("SELECT * FROM employee_details WHERE user_id  = ". mysql_real_escape_string($userId) ." ");
		
				$info2 = $info->result_array();
				$salary = $info2[0]['salary'];
			
				$selcont = $this->db->query("SELECT employee
												FROM sss										
												WHERE min_salary  < ". $salary ." AND max_salary > ". $salary. " ");
			
				$selcont2 = $selcont->result_array();
				$ssscont = $selcont2[0]['employee'];
				
				$selcont3 = $this->db->query("SELECT employee
												FROM philhealth_table										
												WHERE min_salary  <= ". $salary ." AND max_salary > ". $salary. " ");
												
				$selcont4 = $selcont3->result_array();
				$philhealth = $selcont4[0]['employee'];
				
				$pagibig = $salary/2*.02;
				
				$exeAddEmpContri = $this->db->query("UPDATE  emp_contributions
											SET	sss 		= '". mysql_real_escape_string($ssscont) ."',
												philhealth 	= '". mysql_real_escape_string($philhealth) ."', 
												pagibig 	= '". mysql_real_escape_string($pagibig) ."'
											WHERE user_id	= '". mysql_real_escape_string($userId) ."' ");
		}

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}

	#this will delete the employee record
	function exeDeleteRecord($userId) {
		$exeDeleteRecord = $this->db->query("DELETE a, b, c, d, e, f
										FROM employees a 
										LEFT JOIN employee_details b 
										ON a.user_id = b.user_id
										LEFT JOIN emp_contributions c
										ON a.user_id = c.user_id
										LEFT JOIN overtime d
										ON a.user_id = d.user_id
										LEFT JOIN absences e
										ON a.user_id = e.user_id
										LEFT JOIN report f
										ON a.user_id = f.user_id
										WHERE a.user_id	= ". mysql_real_escape_string($userId) ." OR b.user_id	= ". mysql_real_escape_string($userId) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	function exeGetSSS() {
		$exeGetSSS = $this->db->query("SELECT *
										FROM sss");
										
		if($exeGetSSS->num_rows() > 0) {
			return $exeGetSSS->result_array();
		} else {
			return false;
		}
	}

	function exeGetSSSToEdit($id) {
		$exeGetSSSToEdit = $this->db->query("SELECT *
										FROM sss										
										WHERE id  = ". $id ."  ");
										
		if($exeGetSSSToEdit->num_rows() > 0) {
			return $exeGetSSSToEdit->result_array();
		} else {
			return false;
		}
	}

	#this will add new record
	function exeAddNewSSS() {
		$exeAddNewSSS = $this->db->query("INSERT INTO sss
									SET	min_salary	= '". mysql_real_escape_string($_POST['minsal']) ."',		
										max_salary 	= '". mysql_real_escape_string(ucwords($_POST['maxsal'])) ."',
										employer 	= '". mysql_real_escape_string(ucwords($_POST['empshare'])) ."', 	
										employee 	= '". mysql_real_escape_string(ucwords($_POST['emplshare'])) ."',
										total		= ". mysql_real_escape_string($_POST['total']) .",
										status		= '". mysql_real_escape_string($_POST['status']) ."' ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will update sss contribution
	function exeUpdateSSSRecord($id) {
		$exeUpdateSSSRecord = $this->db->query("UPDATE sss
									SET	min_salary	= '". mysql_real_escape_string($_POST['minsal']) ."',		
										max_salary 	= '". mysql_real_escape_string($_POST['maxsal']) ."',
										employer 	= '". mysql_real_escape_string($_POST['empshare']) ."', 	
										employee 	= '". mysql_real_escape_string($_POST['emplshare']) ."',
										total		= ". mysql_real_escape_string($_POST['total']) .",
										status		= '". mysql_real_escape_string($_POST['status']) ."'
									WHERE id 		= ". mysql_real_escape_string($id) ." ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will delete the sss record
	function exeDeleteSSSRecord($id) {
		$exeDeleteSSSRecord = $this->db->query("DELETE 
										FROM sss
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#get the list of pay periods
	function exeGetPayperiod() {
		$exeGetPayperiod = $this->db->query("SELECT *
										FROM payperiod
										ORDER BY id DESC");
										
		if($exeGetPayperiod->num_rows() > 0) {
			return $exeGetPayperiod->result_array();
		} else {
			return false;
		}
	}

	#this will add new record on pay period
	function exeAddNewPayperiod() {
		$exeAddNewPayperiod = $this->db->query("INSERT INTO payperiod
									SET	payfrom		= '". mysql_real_escape_string($_POST['payfrom']) ."',		
										payto 		= '". mysql_real_escape_string($_POST['payto']) ."',
										monthend 	= '". mysql_real_escape_string($_POST['monthend']) ."', 
										status		= '". mysql_real_escape_string($_POST['status']) ."' ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	function exeGetPayperiodToEdit($id) {
		$exeGetPayperiodToEdit = $this->db->query("SELECT *
										FROM payperiod										
										WHERE id  = ". $id ."  ");
										
		if($exeGetPayperiodToEdit->num_rows() > 0) {
			return $exeGetPayperiodToEdit->result_array();
		} else {
			return false;
		}
	}

	#this will update record on pay period
	function exeUpdatePayperiod($id) {
		$exeUpdatePayperiod = $this->db->query("UPDATE payperiod
									SET	payfrom		= '". mysql_real_escape_string($_POST['payfrom']) ."',		
										payto 		= '". mysql_real_escape_string($_POST['payto']) ."',
										monthend 	= '". mysql_real_escape_string($_POST['monthend']) ."', 
										status		= '". mysql_real_escape_string($_POST['status']) ."'
									WHERE id 		= ". mysql_real_escape_string($id) ." ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will delete the pay period record
	function exeDeletePayperiod($id) {
		$exeDeletePayperiod = $this->db->query("DELETE 
										FROM payperiod
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#get the list of employees
	function exeGetEmployeeList() {
		$exeGetEmployeeList = $this->db->query("SELECT *
										FROM employees a
										LEFT JOIN employee_details b
										ON a.user_id = b.user_id 
										WHERE a.status >=0");
										
		if($exeGetEmployeeList->num_rows() > 0) {
			return $exeGetEmployeeList->result_array();
		} else {
			return false;
		}
	}

		function exeGetEmployeeListPrint($dept) {
		$exeGetEmployeeListPrint = $this->db->query("SELECT *
										FROM employees a
										LEFT JOIN employee_details b
										ON a.user_id = b.user_id 
										WHERE a.status >=0 and b.department = '$dept'");
										
		if($exeGetEmployeeListPrint->num_rows() > 0) {
			return $exeGetEmployeeListPrint->result_array();
		} else {
			return false;
		}
	}

	#get the mandatory employees contributions
	function exeGetMandatoryContri() {
		$exeGetMandatoryContri = $this->db->query("SELECT *
										FROM emp_contributions a
										LEFT JOIN employees b
										ON a.user_id = b.user_id
										WHERE b.status >= 0");
										
		if($exeGetMandatoryContri->num_rows() > 0) {
			return $exeGetMandatoryContri->result_array();
		} else {
			return false;
		}
	}

	#this will add new record on employees contributions
	function exeAddEmpContri() {
		$info = $this->db->query("SELECT * FROM employee_details WHERE user_id  = ". $_POST['empid'] ." ");

		$info2 = $info->result_array();
		$salary = $info2[0]['salary'];

		$selcont = $this->db->query("SELECT employee
										FROM sss										
										WHERE min_salary  < ". $salary ." AND max_salary > ". $salary. " ");

		$selcont2 = $selcont->result_array();
		$ssscont = $selcont2[0]['employee'];
		
		$selcont3 = $this->db->query("SELECT employee
										FROM philhealth_table										
										WHERE min_salary  <= ". $salary ." AND max_salary > ". $salary. " ");
										
		$selcont4 = $selcont3->result_array();
		$philhealth = $selcont4[0]['employee'];
		
		$pagibig = $salary/2*.02;
		
		$check = $this->db->query("SELECT * FROM emp_contributions WHERE user_id  = ". $_POST['empid'] ." ");
		if($check->num_rows() > 0) {
			return false;
		} else {
			$exeAddEmpContri = $this->db->query("INSERT INTO emp_contributions
										SET	user_id		= '". mysql_real_escape_string($_POST['empid']) ."',		
											sss 		= '". mysql_real_escape_string($ssscont) ."',
											philhealth 	= '". mysql_real_escape_string($philhealth) ."', 
											pagibig 	= '". mysql_real_escape_string($pagibig) ."', 
											status		= '". mysql_real_escape_string($_POST['status']) ."' ");
	
			$rsQuery['affRows'] = $this->db->affected_rows();
			return $rsQuery;
		}
	}

	#get the mandatory employees contributions to edit
	function exeGetMandatoryContriEdit($id) {
		if($this->uri->segment(1) == 'mandatory' || $this->uri->segment(1) == 'overtime' || $this->uri->segment(1) == 'absences' || $this->uri->segment(1) == 'report') {
			$where = " WHERE a.user_id = ". mysql_real_escape_string($id) ." ";
		} else {
			$where = " WHERE a.id = ". mysql_real_escape_string($id) ." ";
		}
		$exeGetMandatoryContriEdit = $this->db->query("SELECT *
										FROM emp_contributions a
										LEFT JOIN employees b
										ON a.user_id = b.user_id
										LEFT JOIN employee_details c
										ON c.user_id = b.user_id
										$where ");
										
		if($exeGetMandatoryContriEdit->num_rows() > 0) {
			return $exeGetMandatoryContriEdit->result_array();
		} else {
			return false;
		}
	}

	#this will update employees contributions
	function exeUpdateEmpContri() {
		$exeUpdateEmpContri = $this->db->query("UPDATE emp_contributions
									SET	philhealth 	= '". mysql_real_escape_string($_POST['philhealth']) ."', 
										pagibig 	= '". mysql_real_escape_string($_POST['pagibig']) ."', 
										status		= '". mysql_real_escape_string($_POST['status']) ."' ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will delete the mandatory contributions
	function exeDeleteEmpContri($id) {
		$exeDeleteEmpContri = $this->db->query("DELETE 
										FROM emp_contributions
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will get the transaction list
	function exeGetTransactions() {
		$exeGetTransactions = $this->db->query("SELECT *
										FROM transactions ");
										
		if($exeGetTransactions->num_rows() > 0) {
			return $exeGetTransactions->result_array();
		} else {
			return false;
		}	
	}

	#this will get the transaction to edit
	function exeGetTransactToEdit($id) {
		$exeGetTransactToEdit = $this->db->query("SELECT *
										FROM transactions 
										WHERE id	= ". mysql_real_escape_string($id) ." ");
										
		if($exeGetTransactToEdit->num_rows() > 0) {
			return $exeGetTransactToEdit->result_array();
		} else {
			return false;
		}	
	}

	#this will get the overtime
	function exetGetOvertime($payid) {
		if($this->uri->segment(5) != '') {
			$and = " AND a.user_id = '". mysql_real_escape_string($this->uri->segment(5)) ."' ";
		} else {
			if($_SESSION['userLevel'] != 1 ) {
				$and = " AND b.user_id = '". mysql_real_escape_string($_SESSION['userId']) ."' ";
			} else {
				$and = "";	
			}
		}
		$exetGetOvertime = $this->db->query("SELECT *
										FROM overtime a
										LEFT JOIN employees b
										ON a.user_id = b.user_id 
										WHERE a.payperiod = '". mysql_real_escape_string($payid) ."'
										$and ");

		if($exetGetOvertime->num_rows() > 0) {
			return $exetGetOvertime->result_array();
		} else {
			return true;
		}	
	}

	#this will add employees overtime
	function exeAddEmpOvertime() {
		$exetGetOvertime = $this->db->query("SELECT *
										FROM overtime
										WHERE payperiod = '". $this->uri->segment(3) ."'
										AND user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");

		if($exetGetOvertime->num_rows() > 0) {
			return false;
		} else {
			$checkemp = $this->db->query("SELECT * 
										FROM employee_details
										WHERE user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");
										
			$check = $checkemp->result_array();
			$salary = $check[0]['salary'];
			
			// 22 working days in a month
			$rate_per_day = $salary / 22;
			
			// rate per hour
			$rate_per_hour = $rate_per_day / 8;
			
			$otrate = $rate_per_hour * $_POST['hours'];
									
			$exeAddEmpOvertime = $this->db->query("INSERT INTO overtime
										SET user_id 	= '". mysql_real_escape_string($_POST['userid']) ."',
											payperiod 	= '". $this->uri->segment(3)."',
											hours 		= '". mysql_real_escape_string($_POST['hours']) ."',
											rate 		= '". mysql_real_escape_string($otrate) ."',
											status		= '". mysql_real_escape_string($_POST['status']) ."' ");

			$rsQuery['affRows'] = $this->db->affected_rows();
			return $rsQuery;	
		}	
	}

	#this will get the overtime
	function exetGetOvertimeToEdit($payid,$userid) {
		$exetGetOvertimeToEdit = $this->db->query("SELECT *
										FROM overtime 
										WHERE payperiod = '". mysql_real_escape_string($payid) ."'
										AND user_id 	= '". mysql_real_escape_string($userid) ."' ");

		if($exetGetOvertimeToEdit->num_rows() > 0) {
			return $exetGetOvertimeToEdit->result_array();
		} else {
			return false;
		}	
	}

	#this will update employees overtime
	function exeUpdateEmpOvertime($payperiod,$empid) {
		$checkemp = $this->db->query("SELECT * 
										FROM employee_details
										WHERE user_id 	= '". mysql_real_escape_string($empid) ."' ");
										
		$check = $checkemp->result_array();
		$salary = $check[0]['salary'];
		
		// 22 working days in a month
		$rate_per_day = $salary / 22;
		
		// rate per hour
		$rate_per_hour = $rate_per_day / 8;
		
		$otrate = $rate_per_hour * $_POST['hours'];
		
		$exeUpdateEmpOvertime = $this->db->query("UPDATE overtime
										SET hours 		= '". mysql_real_escape_string($_POST['hours']) ."',
											rate 		= '". mysql_real_escape_string($otrate) ."',
											status		= '". mysql_real_escape_string($_POST['status']) ."'
										WHERE payperiod = '". mysql_real_escape_string($payperiod) ."' 
										AND user_id 	= '". mysql_real_escape_string($empid) ."'  ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}

	#this will delete the employees overtime
	function exeDeleteOvertime($id) {
		$exeDeleteOvertime = $this->db->query("DELETE 
										FROM overtime
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will get the absences
	function exetGetAbsences($payid) {
		if($this->uri->segment(5) != '') {
			$and = " AND b.user_id = '". mysql_real_escape_string($this->uri->segment(5)) ."' ";
		} else {
			if($_SESSION['userLevel'] != 1 ) {
				$and = " AND b.user_id = '". mysql_real_escape_string($_SESSION['userId']) ."' ";
			} else {
				$and = "";	
			}
		}
		$exetGetAbsences = $this->db->query("SELECT *
										FROM absences a
										LEFT JOIN employees b
										ON a.user_id = b.user_id 
										WHERE a.payperiod = '". mysql_real_escape_string($payid) ."'
										$and ");

		if($exetGetAbsences->num_rows() > 0) {
			return $exetGetAbsences->result_array();
		} else {
			return false;
		}	
	}

	#this will get the employees overtime to edit
	function exetGetAbsencesToEdit($payid,$userid) {
		$exetGetAbsencesToEdit = $this->db->query("SELECT *
										FROM absences a
										LEFT JOIN employees b
										ON a.user_id = b.user_id  
										WHERE a.payperiod = '". mysql_real_escape_string($payid) ."'
										AND b.user_id 	= '". mysql_real_escape_string($userid) ."' ");

		if($exetGetAbsencesToEdit->num_rows() > 0) {
			return $exetGetAbsencesToEdit->result_array();
		} else {
			return false;
		}	
	}

	#this will add employees absences
	function exeAddEmpAbsences() {
		$exetGetOvertime = $this->db->query("SELECT *
										FROM absences
										WHERE payperiod = '". $this->uri->segment(3) ."'
										AND user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");

		if($exetGetOvertime->num_rows() > 0) {
			return false;
		} else {
			$checkemp = $this->db->query("SELECT * 
										FROM employee_details
										WHERE user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");
										
			$check = $checkemp->result_array();
			$salary = $check[0]['salary'];
			
			// 22 working days in a month
			$rate_per_day = $salary / 22;
			
			// rate per hour
			//$rate_per_hour = $rate_per_day / 8;
			
			$absent_rate = $rate_per_day * $_POST['absent'];
			
			$exeAddEmpAbsences = $this->db->query("INSERT INTO absences
											SET user_id 	= '". mysql_real_escape_string($_POST['userid']) ."',
												payperiod 	= '". $this->uri->segment(3)."',
												absent 		= '". mysql_real_escape_string($_POST['absent']) ."',
												rate 		= '". mysql_real_escape_string($absent_rate) ."',
												status		= '". mysql_real_escape_string($_POST['status']) ."' ");

			$rsQuery['affRows'] = $this->db->affected_rows();
			return $rsQuery;
		}
	}

	#this will update employees absneces
	function exeUpdateEmpAbsences($payperiod,$empid) {
		$checkemp = $this->db->query("SELECT * 
										FROM employee_details
										WHERE user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");
										
		$check = $checkemp->result_array();
		$salary = $check[0]['salary'];
		
		// 22 working days in a month
		$rate_per_day = $salary / 22;
		
		// rate per hour
		//$rate_per_hour = $rate_per_day / 8;
		
		$absent_rate = $rate_per_day * $_POST['absent'];
			
		$exeUpdateEmpAbsences = $this->db->query("UPDATE absences
										SET absent 		= '". mysql_real_escape_string($_POST['absent']) ."',
											rate 		= '". mysql_real_escape_string($absent_rate) ."',
											status		= '". mysql_real_escape_string($_POST['status']) ."'
										WHERE payperiod = '". mysql_real_escape_string($payperiod) ."' 
										AND user_id 	= '". mysql_real_escape_string($empid) ."'  ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}

	#this will delete the employees absences
	function exeDeleteAbsences($id) {
		$exeDeleteAbsences = $this->db->query("DELETE 
										FROM absences
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	function getContributions($userid) {
		$getContributions = $this->db->query("SELECT *
										FROM emp_contributions
										WHERE user_id = '". mysql_real_escape_string($userid) ."'
										AND status = 1 ");

		if($getContributions->num_rows() > 0) {
			return $getContributions->result_array();
		} else {
			return false;
		}	
	}

	#this will get report
	function exeGetreport($payid) {
		if($this->uri->segment(5) != '') {
			$and = " AND b.user_id = '". mysql_real_escape_string($this->uri->segment(5)) ."' ";
		} else {
			if($_SESSION['userLevel'] != 1 ) {
				$and = " AND b.user_id = '". mysql_real_escape_string($_SESSION['userId']) ."' ";
			} else {
				$and = "";	
			}
		}
		$exeGetreport = $this->db->query("SELECT *
										FROM report a
										LEFT JOIN employees b
										ON a.user_id = b.user_id 
										LEFT JOIN employee_details c
										ON c.user_id = b.user_id
										LEFT JOIN payperiod d
										ON d.id = a.payperiod
										WHERE a.payperiod = '". mysql_real_escape_string($payid) ."'
										$and ");

		if($exeGetreport->num_rows() > 0) {
			return $exeGetreport->result_array();
		} else {
			return false;
		}		
	}

	#this will get payslip
	function exeGetPayslip($payid) {
		if($this->uri->segment(5) != '') {
			$and = " AND b.user_id = '". mysql_real_escape_string($this->uri->segment(5)) ."' ";
		} else {
			if($_SESSION['userLevel'] != 1 ) {
				$and = " AND b.user_id = '". mysql_real_escape_string($_SESSION['userId']) ."' ";
			} else {
				$and = "";	
			}
		}
		$exeGetPayslip = $this->db->query("SELECT *
										FROM payslip a
										LEFT JOIN employees b
										ON a.user_id = b.user_id 
										LEFT JOIN employee_details c
										ON c.user_id = b.user_id
										LEFT JOIN payperiod d
										ON d.id = a.payperiod
										LEFT JOIN overtime e
										ON e.user_id = b.user_id
										LEFT JOIN absences f
										ON f.user_id = b.user_id
										WHERE a.payperiod = '". mysql_real_escape_string($payid) ."'
										$and ");

		if($exeGetPayslip->num_rows() > 0) {
			return $exeGetPayslip->result_array();
		} else {
			return false;
		}		
	}
	

	#this will get the tax to be applied
	function exeGetBirTax() {
		$exeGetBirTax = $this->db->query("SELECT *
										FROM semi_birtable ");	

		if($exeGetBirTax->num_rows() > 0) {
			return $exeGetBirTax->result_array();
		} else {
			return false;
		}	
	}
	#this will save the pay slip
		function exeAddPaySlip() {
		$exeAddPaySlip = $this->db->query("INSERT INTO payslip
										SET user_id 		= '". mysql_real_escape_string($_POST['userid']) ."',
											payperiod 		= '". mysql_real_escape_string($this->uri->segment(3)) ."',
											sss 			= '". mysql_real_escape_string($_POST['sss2']) ."',
											philhealth 		= '". mysql_real_escape_string($_POST['philhealth2']) ."',
											pagibig 		= '". mysql_real_escape_string($_POST['pagibig2']) ."',
											monthend 		= '". mysql_real_escape_string($_POST['monthend2']) ."',
											overtime 		= '". mysql_real_escape_string($_POST['otrate2']) ."',
											absences 		= '". mysql_real_escape_string($_POST['abrate2']) ."',
											witholdingtax 	= '". mysql_real_escape_string($_POST['withholdingtax2']) ."',
											netpay 			= '". mysql_real_escape_string($_POST['netpay2']) ."' ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}
	
	#this will delete the employees payslip
	function exeDeletePayslip($id) {
		$exeDeletePayslip = $this->db->query("DELETE 
										FROM payslip
										WHERE payperiod = '". $this->uri->segment(3) ."'
										AND user_id 	= '". mysql_real_escape_string($id) ."' ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}
	#this will save the pay slip
	function exeAddreport() {
		$exeAddreport = $this->db->query("INSERT INTO report
										SET user_id 		= '". mysql_real_escape_string($_POST['userid']) ."',
											payperiod 		= '". mysql_real_escape_string($this->uri->segment(3)) ."',
											sss 			= '". mysql_real_escape_string($_POST['sss2']) ."',
											philhealth 		= '". mysql_real_escape_string($_POST['philhealth2']) ."',
											pagibig 		= '". mysql_real_escape_string($_POST['pagibig2']) ."',
											monthend 		= '". mysql_real_escape_string($_POST['monthend2']) ."',
											overtime 		= '". mysql_real_escape_string($_POST['otrate2']) ."',
											absences 		= '". mysql_real_escape_string($_POST['abrate2']) ."',
											witholdingtax 	= '". mysql_real_escape_string($_POST['withholdingtax2']) ."',
											grosspay 	= '". mysql_real_escape_string($_POST['grosspay2']) ."',
											netpay 			= '". mysql_real_escape_string($_POST['netpay2']) ."' ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}
	
	#this will delete the employees report
	function exeDeletereport($id) {
		$exeDeletereport = $this->db->query("DELETE 
										FROM report
										WHERE payperiod = '". $this->uri->segment(3) ."'
										AND user_id 	= '". mysql_real_escape_string($id) ."' ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}
	
	#this will get the year period
	function exeGetYearPeriod() {
		$exeGetYearPeriod = $this->db->query("SELECT *
										FROM yearperiod
										ORDER BY id ASC");
										
		if($exeGetYearPeriod->num_rows() > 0) {
			return $exeGetYearPeriod->result_array();
		} else {
			return false;
		}
	}
	
	#this will get the 13th month
	function exetGet13Month($payid) {
		if($this->uri->segment(5) != '') {
			$and = " AND b.user_id = '". mysql_real_escape_string($this->uri->segment(5)) ."' ";
		} else {
			$and = "";
		}
		$exetGet13Month = $this->db->query("SELECT *
										FROM 13month a
										LEFT JOIN employees b
										ON a.user_id = b.user_id 
										WHERE a.yearperiod = '". mysql_real_escape_string($payid) ."'
										$and ");

		if($exetGet13Month->num_rows() > 0) {
			return $exetGet13Month->result_array();
		} else {
			return false;
		}	
	}
	
	#this will add employees 13th month
	function exeAddEmp13Month() {
		$exetGet13Month = $this->db->query("SELECT *
										FROM 13month
										WHERE yearperiod = '". $this->uri->segment(3) ."'
										AND user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");

		if($exetGet13Month->num_rows() > 0) {
			return false;
		} else {
			$checkemp = $this->db->query("SELECT * 
										FROM employee_details
										WHERE user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");
										
			$check = $checkemp->result_array();
			$salary = $check[0]['salary'];
			
			$bonus = ($_POST['workedmonths'] * $salary)/12;
			if($bonus > 30000) {
				$temp = $bonus - 30000;
				$bonus_taxed = $temp - ($temp * 0.32);
				$totabonus = $bonus_taxed + $bonus;
			} else {
				$totabonus = $bonus;	
			}
			
			$exeAddEmp13Month = $this->db->query("INSERT INTO 13month
											SET user_id 	= '". mysql_real_escape_string($_POST['userid']) ."',
												yearperiod 	= '". $this->uri->segment(3)."',
												no_of_months = '". mysql_real_escape_string($_POST['workedmonths']) ."',
												amount 		= '". mysql_real_escape_string($totabonus) ."',
												status		= '". mysql_real_escape_string($_POST['status']) ."' ");

			$rsQuery['affRows'] = $this->db->affected_rows();
			return $rsQuery;
		}
	}
	
	#this will update employees 13th month
	function exeUpdateEmp13Month($yearperiod,$empid) {
		$checkemp = $this->db->query("SELECT * 
										FROM employee_details
										WHERE user_id 	= '". mysql_real_escape_string($_POST['userid']) ."' ");
										
		$check = $checkemp->result_array();
		$salary = $check[0]['salary'];
		
		$bonus = ($_POST['workedmonths'] * $salary)/12;
		if($bonus > 30000) {
			$bonus_taxed = ($bonus - 30000) * 0.32;
			$totabonus = $bonus_taxed + $bonus;
		} else {
			$totabonus = $bonus;	
		}
			
		$exeUpdateEmp13Month = $this->db->query("UPDATE 13month
										SET user_id 	= '". mysql_real_escape_string($_POST['userid']) ."',
												yearperiod 	= '". $this->uri->segment(3)."',
												no_of_months = '". mysql_real_escape_string($_POST['workedmonths']) ."',
												amount 		= '". mysql_real_escape_string($totabonus) ."',
												status		= '". mysql_real_escape_string($_POST['status']) ."'
										WHERE yearperiod = '". mysql_real_escape_string($yearperiod) ."' 
										AND user_id 	= '". mysql_real_escape_string($empid) ."'  ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;
	}
	
	#this will get the employees 13th month to edit
	function exetGet13MonthToEdit($yearid,$userid) {
		$exetGet13MonthToEdit = $this->db->query("SELECT *
										FROM 13month a
										LEFT JOIN employees b
										ON a.user_id = b.user_id  
										WHERE a.yearperiod = '". mysql_real_escape_string($yearid) ."'
										AND b.user_id 	= '". mysql_real_escape_string($userid) ."' ");

		if($exetGet13MonthToEdit->num_rows() > 0) {
			return $exetGet13MonthToEdit->result_array();
		} else {
			return false;
		}	
	}
	
	#this will delete the employees 13th month
	function exeDelete13thMonth($id) {
		$exeDelete13thMonth = $this->db->query("DELETE 
										FROM 13month
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will add new record on pay period
	function exeAddNewYearperiod() {
		$exeCheckYear = $this->db->query("SELECT *
										FROM yearperiod
										WHERE title = '". mysql_real_escape_string($_POST['myear']) ."' ");

		if($exeCheckYear->num_rows() > 0) {
			return false;
		} else {
			$exeAddNewYearperiod = $this->db->query("INSERT INTO yearperiod
										SET	title		= '". mysql_real_escape_string($_POST['myear']) ."',	 
											status		= '". mysql_real_escape_string($_POST['status']) ."' ");
	
			$rsQuery['affRows'] = $this->db->affected_rows();
			return $rsQuery;	
		}
	}

	function exeGetYearperiodToEdit($id) {
		$exeGetYearperiodToEdit = $this->db->query("SELECT *
										FROM yearperiod										
										WHERE id  = ". $id ."  ");
										
		if($exeGetYearperiodToEdit->num_rows() > 0) {
			return $exeGetYearperiodToEdit->result_array();
		} else {
			return false;
		}
	}

	#this will update record on pay period
	function exeUpdateYearperiod($id) {
		$exeUpdateYearperiod = $this->db->query("UPDATE yearperiod
									SET	title		= '". mysql_real_escape_string($_POST['myear']) ."',
										status		= '". mysql_real_escape_string($_POST['status']) ."'
									WHERE id 		= ". mysql_real_escape_string($id) ." ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will delete the pay period record
	function exeDeleteYearperiod($id) {
		$exeDeleteYearperiod = $this->db->query("DELETE 
										FROM yearperiod
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}
	
	#this will add new record on pay period
	function exeAddTimelogs() {
		if(($handle = fopen("timereport/timelogs.csv","r")) !== false){
			while(($data = fgetcsv($handle,8000,",")) !== false){	
				$exeAddLogs = $this->db->query("INSERT INTO timelogs
											SET	emp_id		= '". mysql_real_escape_string($data[0]) ."',	
												timein		= '". mysql_real_escape_string($data[1]) ."',	
												timeout		= '". mysql_real_escape_string($data[2]) ."',
												created_date = '". mysql_real_escape_string($data[3]) ."' ");
					
				
			}
		}
	
		fclose($handle);
	}



	function exeGetPhilhealth() {
		$exeGetPhilhealth = $this->db->query("SELECT *
										FROM philhealth_table");
										
		if($exeGetPhilhealth->num_rows() > 0) {
			return $exeGetPhilhealth->result_array();
		} else {
			return false;
		}
	}

	function exeGetPhilhealthToEdit($id) {
		$exeGetPhilhealthToEdit = $this->db->query("SELECT *
										FROM philhealth_table										
										WHERE id  = ". $id ."  ");
										
		if($exeGetPhilhealthToEdit->num_rows() > 0) {
			return $exeGetPhilhealthToEdit->result_array();
		} else {
			return false;
		}
	}


	#this will add new philhealth record
	function exeAddNewPhilhealth() {
		$exeAddNewPhilhealth = $this->db->query("INSERT INTO philhealth_table
									SET	min_salary	= '". mysql_real_escape_string($_POST['minsal']) ."',		
										max_salary 	= '". mysql_real_escape_string(ucwords($_POST['maxsal'])) ."',
										employer 	= '". mysql_real_escape_string(ucwords($_POST['empshare'])) ."', 	
										employee 	= '". mysql_real_escape_string(ucwords($_POST['emplshare'])) ."',
										total		= ". mysql_real_escape_string($_POST['total']) .",
										status		= '". mysql_real_escape_string($_POST['status']) ."' ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will update philhealth contribution
	function exeUpdatePhilhealthRecord($id) {
		$exeUpdatePhilhealthecord = $this->db->query("UPDATE philhealth_table
									SET	min_salary	= '". mysql_real_escape_string($_POST['minsal']) ."',		
										max_salary 	= '". mysql_real_escape_string($_POST['maxsal']) ."',
										employer 	= '". mysql_real_escape_string($_POST['empshare']) ."', 	
										employee 	= '". mysql_real_escape_string($_POST['emplshare']) ."',
										total		= ". mysql_real_escape_string($_POST['total']) .",
										status		= '". mysql_real_escape_string($_POST['status']) ."'
									WHERE id 		= ". mysql_real_escape_string($id) ." ");

		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	#this will delete the philhealth record
	function exeDeletePhilhealthRecord($id) {
		$exeDeletePhilhealthRecord = $this->db->query("DELETE 
										FROM philhealth_table
										WHERE id	= ". mysql_real_escape_string($id) ." ");		
									
		$rsQuery['affRows'] = $this->db->affected_rows();
		return $rsQuery;	
	}

	##this will get the sss report
	function exetGetSSSReport($payid) {
		$exetGetSSSReport = $this->db->query("SELECT *
										FROM payslip a
										LEFT JOIN employees b
										ON a.user_id = b.user_id 
										LEFT JOIN payperiod c
										ON c.id = a.payperiod
										LEFT JOIN employee_details d
										ON d.user_id = a.user_id
										WHERE a.payperiod = '". mysql_real_escape_string($payid) ."' ");

		if($exetGetSSSReport->num_rows() > 0) {
			return $exetGetSSSReport->result_array();
		} else {
			return false;
		}	
	}

	
}

?>