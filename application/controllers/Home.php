<?php
class Home extends CI_Controller {
	private $_data = array();
	function __construct() {
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
		}
	}
	function index()
	{	
 		$this->load->model('admin');
		$data = array();
		$data['L_strErrorMessage']='';
	    // $data['orderstatus'] = $this->admin->orderstatus();
		// print_r($this->session->userdata());
		$this->load->view('dashboard',$data);
	}	
	
	
	// function download_user()
	// {
	// 	$this->load->model('admin');
	// 	$orders_list  = $this->admin->list_user1();
	// 	$output = '';
	// 	$output .= 'Sr No.,First Name,Last Name, Email,Mobile';
	// 	$output .="\n";
	// 	if($orders_list != '' && count($orders_list) > 0) {
	// 		$i=1;
	// 	foreach($orders_list as $orders) {
			
	// 	$output .= '"'.$i.'","'.$orders['fname'].'","'.$orders['lname'].'","'.$orders['email'].'","'.$orders['mobile'].'"';  
	// 	$output .="\n";
	// 	$i++; }
	// 	}
	// 	$filename = "users.csv";
	// 	header('Content-type: application/csv');
	// 	header('Content-Disposition: attachment; filename='.$filename);
	// 	echo $output;
	// 	exit;	
		
	// }
	 
}