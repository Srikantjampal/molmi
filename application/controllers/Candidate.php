<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Candidate extends CI_Controller
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('candidate_model');
		$this->load->library('form_validation');
		
	}

	function index()
	{
		if (empty($this->session->userdata('candidateId'))) {
			redirect($this->config->item('base_url'));
		}
		$this->load->model('certificate_model');
		$id = $this->session->userdata('candidateId');
		$result = $this->certificate_model->getAllCertificatesCandidates($id);
		$course= $this->CandidateCourse();
		$data['L_strErrorMessage'] = '';
		$sessionData = $this->session->userdata();
		$this->load->view('candidates', ['certificate'=>$result,'course'=>$course,'session'=>$sessionData]);
	}

	public function insert_registration()
	{
		if ($this->input->post()) {
			// Set validation rules
			$this->form_validation->set_rules('empId', 'Employee Id/Passport Number', 'required');
			$this->form_validation->set_rules('firstName', 'First Name', 'required');
			$this->form_validation->set_rules('middleName', 'Middle Name', 'required');
			$this->form_validation->set_rules('lastName', 'Last Name', 'required');
			$this->form_validation->set_rules('dob', 'Date of Birth', 'required');
			$this->form_validation->set_rules('rank', 'Rank', 'required');
			$this->form_validation->set_rules('manager', 'Manager', 'required');
			$this->form_validation->set_rules('whatsapp', 'WhatsApp Contact', 'required');
			$this->form_validation->set_rules('alternate_mobile', 'Alternate Mobile Number');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('nationality', 'Nationality', 'required');
			$this->form_validation->set_rules('indos_no', 'INDOS NO', 'required');
			$this->form_validation->set_rules('declaration', 'Declaration', 'required');

			if ($this->form_validation->run() == FALSE) {
				// Validation failed, load form with errors
				echo validation_errors();
				$this->load->view('candidate-register');
			} else {
				// Prepare data for insertion
				$first_name = $this->input->post('firstName');
				$middle_name = $this->input->post('middleName');
				$last_name = $this->input->post('lastName');
				$candidate_name = $first_name . ' ' . $middle_name . ' ' . $last_name;

				$data = array(
					'candidate_name' => $candidate_name,
					'first_name' => $this->input->post('firstName'),
					'middle_name' => $this->input->post('middleName'),
					'last_name' => $this->input->post('lastName'),
					'cdc_passport' => $this->input->post('empId'),
					'email' => $this->input->post('email'),
					'rank' => $this->input->post('rank'),
					'dob' => $this->input->post('dob'),
					'nationality' => $this->input->post('nationality'),
					'manager' => $this->input->post('manager'),
					'whatsapp' => $this->input->post('whatsapp'),
					'alternate_mobile' => $this->input->post('alternate_number'),
					'indos_no' => $this->input->post('indos_no'),
					'declaration' => $this->input->post('declaration')
				);

				// Check if the candidate already exists in the database
				$exists = $this->candidate_model->check_existing_candidate($data['email'], $data['whatsapp'], $data['alternate_mobile'], $data['cdc_passport']);

				if ($exists) {
					// Candidate already exists, show an error message
					// echo "user exists";	
					$data['L_strErrorMessage'] = "A candidate with this email, WhatsApp contact, alternate mobile, or passport number already exists.";
					// print_r($data['L_strErrorMessage']);
					// $this->load->view('candidate-register', $data);
				} else {
					// Insert data into the database using the model
					if ($response = $this->candidate_model->insert_registration($data)) {
						// print_r($response);
						redirect($this->config->item('base_url') . 'list_candidate');
					} else {
						$this->load->view('candidate-register');
					}
					// echo "user inserted";	
				}
			}
		} else {
			// Show error message
			$data['L_strErrorMessage'] = "Invalid User Name or Password.";
			$this->load->view('candidate-register', $data);
		}
	}


	function profilePage(){
		$id = $this->session->userdata('candidateId');
		$data = $this->candidate_model->get_candidate($id);
		$this->load->view('profile',$data);
	}

	function CandidateCourse(){
		$id = $this->session->userdata('candidateId');
		$this->load->model('certificate_model');
		$certificateDetails = $this->certificate_model->getAllCertificatesCandidates($id);
		$courseDetails = [];
		
		if (!empty($certificateDetails)) {
			$this->load->model('course_model');
	
			foreach ($certificateDetails as $certificate) {
				$course = $this->course_model->get_course($certificate->course_id); 
				if ($course) { 
					$courseDetails[] = $course; 
				}
			}
		}
		
		$this->load->view('candidate_course', ['result' => $courseDetails]);
		return $courseDetails;
	}
	

	function CandidateCertificates(){
		$id= $this->session->userdata('candidateId');
		$this->load->model('certificate_model');
		// $this->load->model('topic_model');
		// $result = array();
		$result = $this->certificate_model->getAllCertificatesCandidates($id);
		// print_r(value: $this->topic_model->get_topic());
		$this->load->view('candidate_certificates',['result' =>$result]);
	}

	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging . 'candidate/lists/';
		$config['per_page'] = '10000';
		$config['first_url'] = '0';
		$data = array();
		//using for searching data...
		$data['name'] = $this->input->post('name');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->candidate_model->lists($config['per_page'], $this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_candidate', $data);

	}

	function add()
	{

		//$L_strErrorMessage='';
		$form_field = $data = array(
			'candidate_name' => '',
			'cdc_passport' => '',
			// 'cdc_password'=>'',			
			'rank' => '',
			'prefix' => '',
			'designation' => '',
			'dob' => '',
			'nationality' => '',
			'profile_image' => '',
		);

		if ($this->input->post('action') == 'add_candidate') {
			foreach ($form_field as $key => $value) {
				$data[$key] = $this->input->post($key);
			}

			if ($_FILES['profile_image']['name'] != '') {
				$tmp_name1 = $_FILES['profile_image']['tmp_name'];
				$rootpath1 = $this->config->item('upload') . "candidate/";

				$logoname = time() . $_FILES['profile_image']['name'];

				move_uploaded_file($tmp_name1, $rootpath1 . $logoname);
				$data['profile_image'] = $logoname;

				$tmp_path = $this->config->item('upload') . "candidate/" . $logoname;
				$image_thumb = $this->config->item('upload') . "candidate/medium/" . $logoname;

				$height = 100;
				$width = 100;

				$this->load->library('image_lib');

				// CONFIGURE IMAGE LIBRARY
				$config['image_library'] = 'gd2';
				$config['source_image'] = $tmp_path;
				$config['new_image'] = $image_thumb;
				$config['maintain_ratio'] = false;
				$config['height'] = $height;
				$config['width'] = $width;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();

				$tmp_path = $this->config->item('upload') . "candidate/" . $logoname;
				$image_thumb = $this->config->item('upload') . "candidate/small/" . $logoname;

				$height = 50;
				$width = 50;

				$this->load->library('image_lib');

				// CONFIGURE IMAGE LIBRARY
				$config['image_library'] = 'gd2';
				$config['source_image'] = $tmp_path;
				$config['new_image'] = $image_thumb;
				$config['maintain_ratio'] = false;
				$config['height'] = $height;
				$config['width'] = $width;

				$this->image_lib->initialize($config);
				$this->image_lib->resize();
				$this->image_lib->clear();

			} else {
				$data['profile_image'] = '';
			}

			$this->candidate_model->add($data);

			$this->session->set_flashdata('L_strErrorMessage', 'Candidate Added Successfully!!!!');

			redirect($this->config->item('base_url') . 'candidate/lists');
		}
		$this->load->view('add_candidate', $data);
	}

	function edit($id)
	{
		if (is_numeric($id)) {
			$result = $this->candidate_model->get_candidate($id);

			$form_field = $data = array(
				'L_strErrorMessage' => '',
				'id' => $result[0]->id,
				'candidate_name' => $result[0]->candidate_name,
				'cdc_passport' => $result[0]->cdc_passport,
				'rank' => $result[0]->rank,
				'prefix' => $result[0]->prefix,
				'designation' => $result[0]->designation,
				'dob' => $result[0]->dob,
				'nationality' => $result[0]->nationality,
				'profile_image' => $result[0]->profile_image,
			);

			if ($this->input->post('action') == 'edit_candidate') {
				foreach ($data as $key => $value) {
					$form_field[$key] = $this->input->post($key);
				}

				if ($_FILES['profile_image']['name'] != '') {
					$tmp_name1 = $_FILES['profile_image']['tmp_name'];
					$rootpath1 = $this->config->item('upload') . "candidate/";

					$logoname = time() . $_FILES['profile_image']['name'];

					move_uploaded_file($tmp_name1, $rootpath1 . $logoname);
					$form_field['profile_image'] = $logoname;

					$tmp_path = $this->config->item('upload') . "candidate/" . $logoname;
					$image_thumb = $this->config->item('upload') . "candidate/medium/" . $logoname;

					$height = 100;
					$width = 100;

					$this->load->library('image_lib');

					// CONFIGURE IMAGE LIBRARY
					$config['image_library'] = 'gd2';
					$config['source_image'] = $tmp_path;
					$config['new_image'] = $image_thumb;
					$config['maintain_ratio'] = false;
					$config['height'] = $height;
					$config['width'] = $width;

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();

					$tmp_path = $this->config->item('upload') . "candidate/" . $logoname;
					$image_thumb = $this->config->item('upload') . "candidate/small/" . $logoname;

					$height = 50;
					$width = 50;

					$this->load->library('image_lib');

					// CONFIGURE IMAGE LIBRARY
					$config['image_library'] = 'gd2';
					$config['source_image'] = $tmp_path;
					$config['new_image'] = $image_thumb;
					$config['maintain_ratio'] = false;
					$config['height'] = $height;
					$config['width'] = $width;

					$this->image_lib->initialize($config);
					$this->image_lib->resize();
					$this->image_lib->clear();

				} else {
					$form_field['profile_image'] = '';
				}



				$data = $form_field;
				$this->candidate_model->edit($id, $form_field);
				$this->session->set_flashdata('L_strErrorMessage', 'Candidate Updated Successfully!!!!');
				redirect($this->config->item('base_url') . 'candidate/lists');

			}

			$this->load->view('edit_candidate', $data);
		} else {
			$this->session->set_flashdata('L_strErrorMessage', 'No Such Candidate !!!!');
			redirect($this->config->item('base_url') . 'candidate/lists');
		}
	}

	function deleteEntry($id)
	{
		if ($this->candidate_model->deleteEntry($id)) {
			$this->session->set_flashdata('L_strErrorMessage', 'Candidate Deleted Successfully!!!!');
		} else {
			$this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
		}
		redirect($this->config->item('base_url') . 'candidate/lists');
	}

	function export()
	{
		$candidate = $this->candidate_model->candidatelists();
		$output = '';
		$output .= 'Employee ID,Prefix,Candidate Name,Designation,Date Of Birth,C.D.C / Passport,Nationality';
		$output .= "\n";
		// Get Records from the table
		if ($candidate != '' && count($candidate) > 0) {
			foreach ($candidate as $subd) {
				$strtotime = strtotime($subd->dob);
				$output .= '"' . $subd->rank . '","' . $subd->prefix . '","' . $subd->candidate_name . '","' . $subd->designation . '","' . date('d-m-Y', $strtotime) . '","' . $subd->cdc_passport . '","' . $subd->nationality . '"';
				$output .= "\n";
			}
		}
		$filename = "candidates.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=' . $filename);
		echo $output;
		exit;
	}

	function upload()
	{
		ini_set('memory_limit', -1);
		if ($this->input->post('action') == 'upload_candidate') {
			$data['error'] = '';

			$file_path = $_FILES['csv']['tmp_name'];
			$file_type = $_FILES['csv']['type'];
			$this->load->library('PHPExcel');
			if ($file_type == 'text/csv') {
				$objReader = new PHPExcel_Reader_CSV();
				$PHPExcel = $objReader->load($file_path);
			} else {
				$PHPExcel = PHPExcel_IOFactory::load($file_path);
			}
			$objWorksheet = $PHPExcel->getActiveSheet();
			$highestrow = $objWorksheet->getHighestRow();
			if ($highestrow != 0) {
				//echo "<pre>";print_r($highestrow);echo "</pre>";exit;
				for ($i = 2; $i <= $highestrow; $i++) {
					$obj_insData = array(
						'code.' => addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue())
					);

					if ($obj_insData == '' && count($obj_insData) == '0') {
						// continue;
					} else {

						$rank = addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue());
						$prefix = addslashes($PHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue());
						$candidate_name = addslashes($PHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue());
						$designation = addslashes($PHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue());
						$dob = addslashes($PHPExcel->getActiveSheet()->getCell('E' . $i)->getValue());

						$dob1 = strtotime($dob);
						$dob = date('Y-m-d', $dob1);

						$cdc_passport = addslashes($PHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue());
						$nationality = addslashes($PHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue());

						$data = array(
							'rank' => $rank,
							'prefix' => $prefix,
							'candidate_name' => $candidate_name,
							'designation' => $designation,
							'dob' => $dob,
							'cdc_passport' => $cdc_passport,
							'nationality' => $nationality,
						);
						// echo "<pre>";print_r($data);echo"</pre>";exit;

						if ($data['rank'] != '') {
							if ($this->candidate_model->isExistByrank($rank)) {
								$candidate_id = $this->candidate_model->getcandidatebyrank($rank);
								$this->candidate_model->update_candidate($candidate_id, $data);
							} else {
								$candidate_id = $this->candidate_model->addCandidateData($data);
							}

						}
					}
				}
			}
			$this->session->set_flashdata('L_strErrorMessage', 'Your Data File Uploaded Successfully.!!');
			redirect($this->config->item('base_url') . 'candidate/lists');
		}
		$data = array();
		$this->load->view('upload_candidate', $data);
	}
}