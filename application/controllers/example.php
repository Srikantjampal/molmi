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
		//print_r($data);die;

		if ($this->session->userdata('adminId') != '') {
			redirect($this->config->item('base_url') . 'home');
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



	function login()
	{
		// ini_set('display_errors', 0);
		// ini_set('display_startup_errors', 0);
		// error_reporting(E_ALL);

		r_print("entered login function");
		$this->load->library('session');

		$this->load->library('validation');

		if ($this->input->post("action") == "login") {

			$form_field = array(

				'txtInput' => '',

				'txtPassword' => '',
				'userRole' => ''

			);



			$rules['txtInput'] = "trim|required";

			$rules['txtPassword'] = "trim|required";

			$rules['userRole'] = "trim|required";

			$this->validation->set_rules($rules);



			$fields['txtInput'] = "Email";

			$fields['txtPassword'] = "Password";

			$fields['userRole'] = "User Role";


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
				$username = $this->input->post("txtInput");
				$password = $this->input->post("txtPassword");
				$userRole = $this->input->post("userRole");

				$loginData = array(
					'username' => $username,
					'password' => $password
				);


				if ($userRole == 'super_admin') {
					// Load the admin model and check login

					$this->load->model('admin');
					$response = $this->admin_model->check_login($loginData);

					log_message('info', 'SuperAdmin login data: ' . print_r($loginData, true));

					if ($response) {
						// Set session for Super Admin
						$newdata = array(
							'username' => $response->username,
							'adminId' => $response->id,
							'role' => 'super_admin',
							'upermission' => $response->permission,
						);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url') . 'home');
					} else {
						$data['L_strErrorMessage'] = "Invalid Username or Password for Super Admin.";
						$this->load->view('login', $data);
					}
				} else if ($userRole == 'candidate') {
					// Load the candidate model and check login
					$this->load->model('candidate');
					$response = $this->candidate_model->check_candidate_login($loginData);
					log_message('info', 'Trainer login data: ' . print_r($loginData, true));

					if ($response) {
						// Set session for Candidate
						$newdata = array(
							'username' => $response->username,
							'candidateId' => $response->id,
							'role' => 'candidate',
						);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url') . 'candidate');
					} else {
						$data['L_strErrorMessage'] = "Invalid Username or Password for Candidate.";
						$this->load->view('login', $data);
					}
				} else if ($userRole == 'trainer') {
					// Load the trainer model and check login
					$this->load->model('trainer');
					$response = $this->trainer_model->check_trainer_login($loginData);
					log_message('info', 'Candidate login data: ' . print_r($loginData, true));
					if ($response) {
						// Set session for Trainer
						$newdata = array(
							'username' => $response->username,
							'trainerId' => $response->id,
							'role' => 'trainer',
						);
						$this->session->set_userdata($newdata);
						redirect($this->config->item('base_url') . 'trainer');
					} else {
						$data['L_strErrorMessage'] = "Invalid Username or Password for Trainer.";
						$this->load->view('login', $data);
					}
				} else {

					foreach ($form_field as $key => $value) {

						$data[$key] = $this->input->post($key);

					}

					$data['L_strErrorMessage'] = "Invalid User Name  or Password.";

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