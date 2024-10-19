<?php
class Course extends CI_Controller
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('adminId') == '') {
			redirect($this->config->item('base_url'));
		}
		$this->load->model('course_model');
	}
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging . 'course/lists/';
		$config['per_page'] = '10000';
		$config['first_url'] = '0';
		$data = array();
		//using for searching data...
		$data['name'] = $this->input->post('name');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->course_model->lists($config['per_page'], $this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_course', $data);

	}


	function add()
	{

		//$L_strErrorMessage='';
		$form_field = $data = array(
			'topic' => '',
			'course_name' => '',
			'start_serial' => '',
			'cdc_passport' => '',
			'cert_competency' => '',
			'description1' => '',
			'remarks' => '',
		);

		if ($this->input->post('action') == 'add_course') {
			foreach ($form_field as $key => $value) {
				$data[$key] = $this->input->post($key);
			}

			$this->course_model->add($data);

			$this->session->set_flashdata('L_strErrorMessage', 'Course Added Successfully!!!!');

			redirect($this->config->item('base_url') . 'course/lists');
		}
		$data['all_topics'] = $this->course_model->alldata("topic");
		$this->load->view('add_course', $data);
	}

	function edit($id)
	{
		if (is_numeric($id)) {
			$result = $this->course_model->get_course($id);

			$form_field = $data = array(
				'L_strErrorMessage' => '',
				'id' => $result[0]->id,
				'topic' => $result[0]->topic,
				'course_name' => $result[0]->course_name,
				'start_serial' => $result[0]->start_serial,
				'cdc_passport' => $result[0]->cdc_passport,
				'cert_competency' => $result[0]->cert_competency,
				'description1' => $result[0]->description1,
				'remarks' => $result[0]->remarks,
				'primary_trainer_id' => $result[0]->primary_trainer_id,
				'secondary_trainer_id' => $result[0]->secondary_trainer_id,
			);


			if ($this->input->post('action') == 'edit_course') {

				foreach ($data as $key => $value) {
					$form_field[$key] = $this->input->post($key);
				}	
				$secondary_trainer_ids = $this->input->post('secondary_trainer_id');

				$form_field['secondary_trainer_id'] = !empty($secondary_trainer_ids) ? implode(',', $secondary_trainer_ids) : '';

				// echo "<pre>";
				// print_r(json_encode($form_field['secondary_trainer_id']));
				// echo "</pre>";
				// die;
			
				$this->course_model->edit($id, $form_field);
				$this->session->set_flashdata('L_strErrorMessage', 'Course Updated Successfully!!!!');
				redirect($this->config->item('base_url') . 'course/lists');
			}

			if ($this->input->post('action') == 'edit_candidate') {
				$candidate_id = $this->input->post('topic');
				$course_id = $result[0]->id;
				$trainer_id = $result[0]->primary_trainer_id;
				$this->course_model->add_candidate($candidate_id, $course_id, $trainer_id);
				$this->session->set_flashdata('L_strErrorMessage', 'Candidate Added Successfully!!!!');
				redirect($this->config->item('base_url') . 'course/edit/' . $course_id);
			}
			if ($this->input->post('action') == 'delete_candidate') {
				$candidate_id = $this->input->post('candidate_id');
				$course_id = $result[0]->id;
				$this->course_model->delete_candidate($candidate_id, $course_id);
				$this->session->set_flashdata('L_strErrorMessage', 'Candidate Deleted Successfully!!!!');
				redirect($this->config->item('base_url') . 'course/edit/' . $course_id);


			}
			$this->load->model('trainer_model');
			$this->load->model('candidate_model');

			$data['addition_item'] = $this->course_model->addition_item_course($id);
			$data['all_topics'] = $this->course_model->alldata("topic");

			$data['trainersList'] = $this->trainer_model->trainerlists("trainer_name");

			$primary_trainer_id = $this->input->post('primary_trainer_id');
			$secondaryTrainersList = array_filter($data['trainersList'], function ($trainer) use ($primary_trainer_id) {
				return $trainer->id != $primary_trainer_id;  // Exclude primary trainer
			});
			$data['secondaryTrainersList'] = $secondaryTrainersList;

			$data['candidatesList'] = $this->candidate_model->candidatelists("candidate_name");
			$data["candidatesDataList"] = $this->course_model->get_candidates_by_id($result[0]->id);
			$course= $this->course_model->get_course($id);
			$secondary_trainer_data = json_decode($course->secondary_trainer_id,true);
			$secondaryTrainerData= $secondary_trainer_data[0]['secondary_trainer_id'];
			echo "<pre>";
			print_r($secondaryTrainerData); // Output will be: Array ( [0] => 40 [1] => 39 )
			echo "</pre>";
			
			$data['secondary_trainer_id'] = explode(',', $secondaryTrainerData);

			// $data['secondary_trainer_id'] = !empty($course) ? explode(',', $secondaryTrainerData) : [];

			$this->load->view('edit_course', $data);
		} else {
			$this->session->set_flashdata('L_strErrorMessage', 'No Such Course !!!!');
			redirect($this->config->item('base_url') . 'course/lists');
		}
	}

	function addCandidate()
	{
	}

	function deleteEntry($id)
	{
		if ($this->course_model->deleteEntry($id)) {
			$this->session->set_flashdata('L_strErrorMessage', 'Course Deleted Successfully!!!!');
		} else {
			$this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
		}
		redirect($this->config->item('base_url') . 'course/lists');
	}

	function removeAtt($cid, $id)
	{
		if ($this->course_model->removeattriute($cid, $id)) {
			$this->session->set_flashdata('L_strErrorMessage', 'Deleted Succcessfully!!!!');
			redirect($this->config->item('base_url') . 'course/edit/' . $cid);
		} else {
			$this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
			exit;
		}
	}

	function export()
	{
		$course = $this->course_model->courselists();
		$output = '';
		$output .= 'Topic,Course Name,Start Serial,C.D.C / Passport,Cert. Of Competency,Description,Remarks';
		$output .= "\n";
		// Get Records from the table
		if ($course != '' && count($course) > 0) {
			foreach ($course as $subd) {
				$topicName = $this->course_model->get_topic_name($subd->topic);
				$output .= '"' . $topicName . '","' . $subd->course_name . '","' . $subd->start_serial . '","' . $subd->cdc_passport . '","' . $subd->cert_competency . '","' . $subd->description1 . '","' . $subd->remarks . '"';
				$output .= "\n";
			}
		}
		$filename = "courses.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename=' . $filename);
		echo $output;
		exit;
	}

	function upload()
	{
		ini_set('memory_limit', -1);
		if ($this->input->post('action') == 'upload_course') {
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

						$topic = $this->course_model->commangetid("topic", "name", "id", addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue()));
						$course_name = addslashes($PHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue());
						$start_serial = addslashes($PHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue());
						$cdc_passport = addslashes($PHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue());
						$cert_competency = addslashes($PHPExcel->getActiveSheet()->getCell('E' . $i)->getValue());
						$description1 = addslashes($PHPExcel->getActiveSheet()->getCell('F' . $i)->getValue());
						$remarks = addslashes($PHPExcel->getActiveSheet()->getCell('G' . $i)->getValue());

						$data = array(
							'topic' => $topic,
							'course_name' => $course_name,
							'start_serial' => $start_serial,
							'cdc_passport' => $cdc_passport,
							'cert_competency' => $cert_competency,
							'description1' => $description1,
							'remarks' => $remarks,
						);
						// echo "<pre>";print_r($data);echo"</pre>";exit;

						if ($data['course_name'] != '') {
							if ($this->course_model->isExistByname($course_name)) {
								$course_id = $this->course_model->getcoursebyname($course_name);
								$this->course_model->update_course($course_id, $data);
							} else {
								$data['added_date'] = date('Y-m-d');
								$course_id = $this->course_model->addcourseData($data);
							}

						}
					}
				}
			}
			$this->session->set_flashdata('L_strErrorMessage', 'Your Data File Uploaded Successfully.!!');
			redirect($this->config->item('base_url') . 'course/lists');
		}
		$data = array();
		$this->load->view('upload_course', $data);
	}

	// public function add_candidate() {
	//     $candidate_id = $this->input->post('candidate_id');
	// 	print_r($candidate_id);
	// 	die;
	// 	$this->load->model('course_model');
	// 	$result = $this->course_model->add_candidate($candidate_id);

	// }
	public function delete_candidate($candidate_id, $course_id)
	{
		if (!empty($candidate_id)) {
			$this->db->where('candidate_id', $candidate_id);
			$this->db->where('course_id', $course_id);
			$this->db->delete('courses_enrollment');

			if ($this->db->affected_rows() > 0) {
				echo json_encode(['status' => 'success', 'message' => 'Candidate deleted successfully.']);
			} else {
				echo json_encode(['status' => 'error', 'message' => 'Candidate not found or could not be deleted.']);
			}
		} else {
			echo json_encode(['status' => 'error', 'message' => 'Invalid candidate ID.']);
		}
	}

	function trainerCourses()
	{
		$this->load->view("trianer_attendance");
	}

}