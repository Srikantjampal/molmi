<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Welcome extends CI_Controller
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('admin');

	}

	function index()
	{
		$this->load->library('session');
		$data = array(
			'eamil' => '',
			'L_strErrorMessage' => '',
			'success' => '',
			'password' => '',
		);

		if ($this->session->userdata('adminId') != '') {
			redirect($this->config->item('base_url') . 'home');
		} else if ($this->session->userdata('candidateId') != '') {
			redirect($this->config->item('base_url') . 'candidate');
		} else if ($this->session->userdata('TrainerId') != '') {
			redirect($this->config->item('base_url') . 'trainer');
		} else {
			$this->load->view('login', $data);
		}
	}
	function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect($this->config->item('base_url'));
	}

	function registeration()
	{
		if ($this->session->userdata('candidateId')) {
			$this->session->set_flashdata('error', 'Page cannot be accessed because you are already logged in.');
			redirect($this->config->item('base_url') . "error");
		} else if ($this->session->userdata('TrainerId')) {
			$this->session->set_flashdata('error', 'Page cannot be accessed because you are already logged in.');
			redirect($this->config->item('base_url') . "error");
		}
		;

		$this->load->view('candidate_registeration');
	}

	function ErrorPage()
	{
		$this->load->view('errorPage');
	}

	function login()
	{

		$this->load->library('session');
		$this->load->library('validation');

		if ($this->input->post("action") == "login") {

			$form_field = array(
				'txtEmail' => '',
				'txtPassword' => ''
			);

			$rules['txtEmail'] = "trim|required";
			$rules['txtPassword'] = "trim|required";
			$this->validation->set_rules($rules);

			$fields['txtEmail'] = "Email";
			$fields['txtPassword'] = "Password";
			$this->validation->set_fields($fields);

			if ($this->validation->run() == FALSE) {
				if ($this->validation->error_string != '') {
					foreach ($form_field as $key => $value) {
						$data[$key] = $this->input->post($key);
					}
				}
				$data['L_strErrorMessage'] = $this->validation->error_string;
				$this->load->view('login', $data);
			} else {
				// Get the user role
				$userRole = $this->input->post("user_role");
				$newdata = array(
					'username' => $this->input->post("txtEmail"),
					'password' => $this->input->post("txtPassword")
				);
				if ($userRole === "SuperAdmin") {
					$this->load->model('admin');

					if ($response = $this->admin->check_login($newdata)) { // SuperAdmin
						$newdata = array(
							'username' => $this->input->post("txtEmail"),
							'uname' => $response->name,
							'uemail' => $response->email,
							'adminId' => $response->id,
							'upermission' => $response->permission,
							'user_role' => $this->input->post("user_role")
						);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url') . 'home');
					} else {
						$data['L_strErrorMessage'] = "Invalid User Name or Password.";
						$this->load->view('login', $data);
					}

				} elseif ($userRole === "Candidate") {
					$this->load->model('candidate_model');
					if ($response = $this->candidate_model->check_candidate_login($newdata)) {
						$newdata = array(
							'candidateId' => $response->id,
							'userEmail' => $this->input->post("txtEmail"),
							'candidate_name' => $response->candidate_name,
							'empId' => $response->cdc_passport,
							'first_name' => $response->first_name,
							'middle_name' => $response->middle_name,
							'last_name' => $response->last_name,
							'dob' => $response->dob,
							'rank' => $response->rank,
							'manager' => $response->manager,
							'whatsapp' => $response->whatsapp,
							'alternate_mobile' => $response->alternate_mobile,
							'nationality' => $response->nationality,
							'indos_no' => $response->indos_no,
							'user_role' => $userRole,
						);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url') . 'candidate');
					} else {
						$data['L_strErrorMessage'] = "Invalid User Name or Password.";
						$this->load->view('login', $data);
					}

				} elseif ($userRole === "Trainer") {
					$this->load->model("trainer_model");
					// echo "trainers";die;
					if ($response = $this->trainer_model->check_trainer_login($newdata)) {
						$newdata = array(
							'username' => $this->input->post("txtEmail"),
							'Tname' => $response->trainer_name,
							'prefix' => $response->prefix,
							'email' => $response->email,
							'TrainerId' => $response->id,
							'user_role' => $userRole,
						);
						$this->session->set_userdata($newdata);
						// $this->load->view("trainers");
						redirect($this->config->item('base_url') . 'candidate');
					} else {
						$data['L_strErrorMessage'] = "Invalid User Name or Password.";
						$this->load->view('login', $data);
					}
				} else {
					$data['L_strErrorMessage'] = "Invalid User Role.";
					$this->load->view('login', $data);
				}
			}
		} else {
			redirect($this->config->item('base_url'));
		}
	}

	function authenticity_verification($id)
	{
		$data['detail'] = $this->admin->get_certificateData($id);
		//echo "<pre>";print_r($data['detail']);echo"</pre>";
		$this->load->view('authenticity_verification', $data);
	}

}