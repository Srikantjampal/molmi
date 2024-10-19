<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Trainer extends CI_Controller
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->model('trainer_model');
	}

	function index()
	{
		if ($this->session->userdata('TrainerId') == '') {
			redirect($this->config->item('base_url'));
		}
		$id = $this->session->userdata('TrainerId');
		$this->load->model('certificate_model');
		$trainerData = $this->certificate_model->getAllcertificates($id);
		$course = $this->countOfCourses($trainerData);
		$data['L_strErrorMessage'] = '';
		$data= $this->session->userdata();
		// print_r($data);
		$this->load->view("trainers",['certificate'=>$trainerData,'course'=>$course,'data'=>$data]);
	}

	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging . 'trainer/lists/';
		$config['per_page'] = '10000';
		$config['first_url'] = '0';
		$data = array();
		//using for searching data...
		$data['name'] = $this->input->post('name');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->trainer_model->lists($config['per_page'], $this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		// echo "<pre>";print_r($data);
		$this->pagination->initialize($config);
		$this->load->view('list_trainer', $data);

	}

	function add()
	{

		//$L_strErrorMessage='';
		$form_field = $data = array(
			'prefix' => '',
			'officer' => '',
			'designation' => '',
			'trainer_name' => '',
			'digital_signature' => '',
			'profile_photo' => '',
			'nationality' => '',

		);

		if ($this->input->post('action') == 'add_trainer') {
			foreach ($form_field as $key => $value) {
				$data[$key] = $this->input->post($key);
			}

			//echo "<pre>";print_r($data);echo"</pre>";exit;
			if ($_FILES['digital_signature']['name'] != '') {
				$tmp_name1 = $_FILES['digital_signature']['tmp_name'];
				$rootpath1 = $this->config->item('upload') . "trainer/";

				$logoname = time() . $_FILES['digital_signature']['name'];

				move_uploaded_file($tmp_name1, $rootpath1 . $logoname);
				$data['digital_signature'] = $logoname;

				$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
				$image_thumb = $this->config->item('upload') . "trainer/medium/" . $logoname;

				$height = 200;
				$width = 78;

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

				$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
				$image_thumb = $this->config->item('upload') . "trainer/small/" . $logoname;

				$height = 100;
				$width = 39;

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
				$data['digital_signature'] = '';
			}

			if ($_FILES['profile_photo']['name'] != '') {
				$tmp_name1 = $_FILES['profile_photo']['tmp_name'];
				$rootpath1 = $this->config->item('upload') . "trainer/";

				$logoname = time() . $_FILES['profile_photo']['name'];

				move_uploaded_file($tmp_name1, $rootpath1 . $logoname);
				$data['profile_photo'] = $logoname;

				$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
				$image_thumb = $this->config->item('upload') . "trainer/medium/" . $logoname;

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

				$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
				$image_thumb = $this->config->item('upload') . "trainer/small/" . $logoname;

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
				$data['profile_photo'] = '';
			}

			$this->trainer_model->add($data);

			$this->session->set_flashdata('L_strErrorMessage', 'Trainer  Added Successfully!!!!');

			redirect($this->config->item('base_url') . 'trainer/lists');
		}
		$this->load->view('add_trainer', $data);
	}

	function edit($id)
	{
		if (is_numeric($id)) {
			$result = $this->trainer_model->get_trainer($id);

			$form_field = $data = array(
				'L_strErrorMessage' => '',
				'id' => $result[0]->id,
				'prefix' => $result[0]->prefix,
				'officer' => $result[0]->officer,
				'designation' => $result[0]->designation,
				'trainer_name' => $result[0]->trainer_name,
				'digital_signature' => $result[0]->digital_signature,
				'profile_photo' => $result[0]->profile_photo,
				'nationality' => $result[0]->nationality,

			);

			if ($this->input->post('action') == 'edit_trainer') {
				foreach ($data as $key => $value) {
					$form_field[$key] = $this->input->post($key);
				}

				if ($_FILES['digital_signature']['name'] != '') {
					$tmp_name1 = $_FILES['digital_signature']['tmp_name'];
					$rootpath1 = $this->config->item('upload') . "trainer/";

					$logoname = time() . $_FILES['digital_signature']['name'];

					move_uploaded_file($tmp_name1, $rootpath1 . $logoname);
					$form_field['digital_signature'] = $logoname;

					$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
					$image_thumb = $this->config->item('upload') . "trainer/medium/" . $logoname;

					$height = 200;
					$width = 78;

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

					$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
					$image_thumb = $this->config->item('upload') . "trainer/small/" . $logoname;

					$height = 100;
					$width = 39;

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
					$form_field['digital_signature'] = '';
				}

				if ($_FILES['profile_photo']['name'] != '') {
					$tmp_name1 = $_FILES['profile_photo']['tmp_name'];
					$rootpath1 = $this->config->item('upload') . "trainer/";

					$logoname = time() . $_FILES['profile_photo']['name'];

					move_uploaded_file($tmp_name1, $rootpath1 . $logoname);
					$form_field['profile_photo'] = $logoname;

					$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
					$image_thumb = $this->config->item('upload') . "trainer/medium/" . $logoname;

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

					$tmp_path = $this->config->item('upload') . "trainer/" . $logoname;
					$image_thumb = $this->config->item('upload') . "trainer/small/" . $logoname;

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
					$form_field['profile_photo'] = '';
				}



				$data = $form_field;
				$this->trainer_model->edit($id, $form_field);
				$this->session->set_flashdata('L_strErrorMessage', 'Trainer Updated Successfully!!!!');
				redirect($this->config->item('base_url') . 'trainer/lists');

			}

			$this->load->view('edit_trainer', $data);
		} else {
			$this->session->set_flashdata('L_strErrorMessage', 'No Such Trainer  !!!!');
			redirect($this->config->item('base_url') . 'trainer/lists');
		}
	}

	function deleteEntry($id)
	{
		if ($this->trainer_model->deleteEntry($id)) {
			$this->session->set_flashdata('L_strErrorMessage', 'Trainer Deleted Successfully!!!!');
		} else {
			$this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
		}
		redirect($this->config->item('base_url') . 'trainer/lists');
	}

	function export()
	{
		$trainer = $this->trainer_model->trainerlists();
		$output = '';
		$output .= 'Prefix,Trainer Name,Designation,Officer';
		$output .= "\n";
		// Get Records from the table
		if ($trainer != '' && count($trainer) > 0) {
			foreach ($trainer as $subd) {
				$output .= '"' . $subd->prefix . '","' . $subd->trainer_name . '","' . $subd->designation . '","' . $subd->officer . '"';
				$output .= "\n";
			}
		}
		$filename = "trainers.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=' . $filename);
		echo $output;
		exit;
	}

	function upload()
	{
		ini_set('memory_limit', -1);
		if ($this->input->post('action') == 'upload_trainer') {
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

						$prefix = addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue());
						$trainer_name = addslashes($PHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue());
						$designation = addslashes($PHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue());
						$officer = addslashes($PHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue());

						$data = array(
							'prefix' => $prefix,
							'trainer_name' => $trainer_name,
							'designation' => $designation,
							'officer' => $officer,
						);
						// echo "<pre>";print_r($data);echo"</pre>";exit;

						if ($data['trainer_name'] != '') {
							$trainer_id = $this->trainer_model->addtrainerData($data);
						}
					}
				}
			}
			$this->session->set_flashdata('L_strErrorMessage', 'Your Data File Uploaded Successfully.!!');
			redirect($this->config->item('base_url') . 'trainer/lists');
		}
		$data = array();
		$this->load->view('upload_trainer', $data);
	}

	function profilePage()
	{
		$this->load->view('profile');
	}

	function trainerCourse()
	{
		$id = $this->session->userdata('TrainerId');
		$this->load->model('course_model');
		// $this->course_model->getAllcourseByTrainerId($id);
		print_r($id);
		$data['TrainerCourses']= $this->course_model->getAllcourseByTrainerId($id);
		// print_r($data['TrainerCourses']); // Check if courses are fetched

		$this->load->view('trainer_course', $data);
	}
	function trainerCandidates()
	{
		$id = $this->session->userdata('TrainerId'); 

		$trainerData = $this->course_model->getAllcourseByTrainerId($id);

		$this->load->model('candidate_model');

		$candidates = [];
		foreach ($trainerData as $trainer) {
			$candidate_id = $trainer->candidate_id; 
			print_r($candidate_id);
			// $candidate = $this->candidate_model->get_candidate_by_Id($candidate_id);
			// if ($candidate) {
			// 	$candidates[] = $candidate; 
			// }
		}
		$this->load->view('trainer_candidates');
	}

	function JiraTicketPage(){
		$this->load->view('jira_ticket_page');
	}

	function countOfCourses($value){
		$courseDetails=[];
		if (!empty($value)) {
			$this->load->model('course_model');

			foreach ($value as $certificate) {
				$course = $this->course_model->get_course($certificate->course_id); 
				if ($course) { 
					$courseDetails[] = $course; 
				}
			}
		}
		return $courseDetails;
	}
}