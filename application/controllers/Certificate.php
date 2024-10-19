<?php
class Certificate extends CI_Controller {
	private $_data = array();
	function __construct() {
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
		}
		$this->load->model('certificate_model');
	}
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'certificate/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['name'] = $this->input->post('name');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->certificate_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_certificate', $data);

	}

	function add()
	{

		//$L_strErrorMessage='';
		$form_field = $data = array( 
				'type' => '',
				'topic'=>'',			
				'course_level'=>'',
				'course_id'=>'',
				'location'=>'',
				'trainer_id'=>'',
				'status'=>'',
				'from_date'=>'',
				'to_date'=>'',
				'days'=>'',
				'issue_date'=>'',
				'show_logo'=>'',
				'description1'=>'',
				'remarks'=>'',
			);

		

		if($this->input->post('action') == 'add_certificate') 
		{
			

			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);	
			}

			//echo "<pre>";print_r($_POST);echo "</pre>";exit;
			$displayAlready = "";
			if($_POST['candidate_id'] !='' && count($_POST['candidate_id']) > 0){
				foreach($_POST['candidate_id'] as $candidateID){ 
					
					
					if($this->certificate_model->certificateAllready($candidateID,$_POST['course_id']))
					{
						$candidateName = $this->certificate_model->get_candidate_name($candidateID);
						$courseName = $this->certificate_model->get_course_name($_POST['course_id']);
						
						$displayAlready .= "Same Certificate for ".$candidateName." with course name ".$courseName." is already there<br/>";

					}
					$this->certificate_model->add($candidateID,$data);
				}
			}
			
			$this->session->set_flashdata('L_strErrorMessage','Certificate Added Successfully!!!!');
			$this->session->set_flashdata('CertiAlready',$displayAlready);

			redirect($this->config->item('base_url').'certificate/lists');
		}
		$data['all_topics']= $this->certificate_model->alldata("topic");
		$data['all_course']= $this->certificate_model->alldata("course");
		$data['all_candidate']= $this->certificate_model->alldata("candidate");
		$data['all_trainer']= $this->certificate_model->alldata("trainer");
		$this->load->view('add_certificate',$data);
	}

	function edit($id)
	{
		if(is_numeric($id))
			{
				$result = $this->certificate_model->get_certificate($id);  

				$form_field = $data = array(
					'L_strErrorMessage' => '',
					'id'	    =>$result[0]->id,
					'type'     =>$result[0]->type,
					'topic'     =>$result[0]->topic,											
					'course_level'       =>$result[0]->course_level,
					'course_id'   =>$result[0]->course_id,
					'candidate_id'=>$result[0]->candidate_id,
					'location'=>$result[0]->location,
					'trainer_id'=>$result[0]->trainer_id,
					'status'=>$result[0]->status,
					'from_date'=>$result[0]->from_date,
					'to_date'=>$result[0]->to_date,
					'days'=>$result[0]->days,
					'issue_date'=>$result[0]->issue_date,
					'show_logo'=>$result[0]->show_logo,
					'description1'=>$result[0]->description1,
					'remarks'=>$result[0]->remarks,
					'certificate_no'=>$result[0]->certificate_no,
				);

				if($this->input->post('action') == 'edit_certificate') 
				{
					foreach($data as $key => $value) 
					{
						$form_field[$key]=$this->input->post($key);	
					}
					
					$data = $form_field;
						$this->certificate_model->edit($id, $form_field);
						$this->session->set_flashdata('L_strErrorMessage','Certificate Updated Successfully!!!!');
						redirect($this->config->item('base_url').'certificate/lists');
					
				}
				$data['addition_item']=$this->certificate_model->addition_item_certificate($id);
				$data['all_topics']= $this->certificate_model->alldata("topic");
				$data['all_course']= $this->certificate_model->alldata("course");
				$data['all_candidate']= $this->certificate_model->alldata("candidate");
				$data['all_trainer']= $this->certificate_model->alldata("trainer");
				$this->load->view('edit_certificate',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Certificate !!!!');
				redirect($this->config->item('base_url').'certificate/lists');
			}
	}
	
	function deleteEntry($id)
	{
		if($this->certificate_model->deleteEntry($id))
				{
					$this->session->set_flashdata('L_strErrorMessage','Certificate Deleted Successfully!!!!');
				}  
				else 
				{
					$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
		redirect($this->config->item('base_url').'certificate/lists');
	}

	function removeAtt($cid, $id) {
        if ($this->certificate_model->removeattriute($cid, $id)) {
            $this->session->set_flashdata('L_strErrorMessage', 'Deleted Succcessfully!!!!');
            redirect($this->config->item('base_url') . 'certificate/edit/' . $cid);
        } else {
            $this->session->set_flashdata('flashError', 'Some Errors prevented from Deleting!!!!');
            exit;
        }
    }

	function export(){
		$course = $this->certificate_model->certificatelists();
		$output = '';
		$output .= 'Certificate No.,Type,Topic,Course Level,Course Name,Candidate Name,Location,Trainers,Status,From Date,To Date,Days,Issue Date,Description,Remarks,Display Logo,Designation,Employee ID';
		$output .="\n";
		// Get Records from the table
		if($course != '' && count($course) > 0) {
			foreach($course as $subd) {

				if($subd->status == 0){
					$status = "Valid";
				}else{
					$status = "In Valid";
				}

				if($subd->show_logo == 0){
					$show_logo = "No";
				}else{
					$show_logo = "Yes";
				}

				$topicName = $this->certificate_model->get_topic_name($subd->topic);
				$candidateName = $this->certificate_model->get_candidate_name($subd->candidate_id);
				$candiDetail = $this->certificate_model->get_candidate_name_list($subd->candidate_id);
				$trainerName = $this->certificate_model->get_trainer_name($subd->trainer_id);
				$courseName = $this->certificate_model->get_course_name($subd->course_id);

				$output .= '"'.$subd->certificate_no.'","'.$subd->type.'","'.$topicName.'","'.$subd->course_level.'","'.$courseName.'","'.$candidateName.'","'.$subd->location.'","'.$trainerName.'","'.$status.'","'.$subd->from_date.'","'.$subd->to_date.'","'.$subd->days.'","'.$subd->issue_date.'","'.$subd->description1.'","'.$subd->remarks.'","'.$show_logo.'","'.$candiDetail->designation.'","'.$candiDetail->rank.'"';  
				$output .="\n";
			}
		}
		$filename = "certificate.csv";
		header('Content-type: application/csv');
		header('Content-Disposition: attachment; filename='.$filename);
		echo $output;
		exit;
	}

	function upload()
    {
        ini_set('memory_limit', -1);
        if ($this->input->post('action') == 'upload_certificate') {
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
                        'code.' => addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue()));

                    if ($obj_insData == '' && count($obj_insData) == '0') {
                       // continue;
                    } else {
                        
                        $certificate_no = addslashes($PHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue());
                        $type = addslashes($PHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue());
						$topic = $this->certificate_model->commangetid("topic","name","id",addslashes($PHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue()));
						$course_level = addslashes($PHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue());
						
						$course_id = $this->certificate_model->commangetid("course","course_name","id",addslashes($PHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue()));

						$candidate_id = $this->certificate_model->commangetid("candidate","candidate_name","id",addslashes($PHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue()));
						
						$location = addslashes($PHPExcel->getActiveSheet()->getCell('G' . $i)->getValue());

						$trainer_id = $this->certificate_model->commangetid("trainer","trainer_name","id",addslashes($PHPExcel->getActiveSheet()->getCell('H'.$i)->getCalculatedValue()));

						$status = addslashes($PHPExcel->getActiveSheet()->getCell('I' . $i)->getCalculatedValue());

						if($status == 'Valid'){
							$status = 0;
						}
						else{
							$status = 1;
						}

						$from_date = addslashes($PHPExcel->getActiveSheet()->getCell('J' . $i)->getValue());
						
						$from_date1 =strtotime($from_date);
						$from_date = date('Y-m-d',$from_date1);

						$to_date = addslashes($PHPExcel->getActiveSheet()->getCell('K' . $i)->getValue());
						
						$to_date1 =strtotime($to_date);
						$to_date = date('Y-m-d',$to_date1);

						$days = addslashes($PHPExcel->getActiveSheet()->getCell('L' . $i)->getValue());

						$issue_date = addslashes($PHPExcel->getActiveSheet()->getCell('M' . $i)->getValue());
						
						$issue_date1 =strtotime($issue_date);
						$issue_date = date('Y-m-d',$issue_date1);

						$description1 = addslashes($PHPExcel->getActiveSheet()->getCell('N' . $i)->getValue());
						$remarks = addslashes($PHPExcel->getActiveSheet()->getCell('O' . $i)->getValue());

						$show_logo = addslashes($PHPExcel->getActiveSheet()->getCell('P' . $i)->getCalculatedValue());

						if($show_logo == 'Yes'){
							$show_logo = 1;
						}
						else{
							$show_logo = 0;
						}

						$data = array(
                            'certificate_no' => $certificate_no,
                            'type' => $type,
                            'topic' => $topic,
							'course_level' => $course_level,
							'course_id' => $course_id,
							'candidate_id' => $candidate_id,
							'location' => $location,
							'trainer_id' => $trainer_id,
							'status' => $status,
							'from_date' => $from_date,
							'to_date' => $to_date,
							'days' => $days,
							'issue_date' => $issue_date,
							'description1' => $description1,
							'remarks' => $remarks,
							'show_logo' => $show_logo,
                        );
                       //echo "<pre>";print_r($data['type']);echo"</pre>";

					//    $subidArray = explode('/',$data['certificate_no']);

					// 	$subid = $subidArray[3];


					   if($data['type'] == 'Others'){

						$subidArray = explode('/',$data['certificate_no']);

						$subid = $subidArray[3];
							
					   }else{

						$subidArray = explode('-',$data['certificate_no']);


						$subid = $subidArray[2];

						$subid = substr($subid, strpos($subid, ")") + 1);

					   }
						
					  

					 //echo "<pre>";print_r($subidArray);echo"</pre>";

					    //echo $subid;
                        if ($data['certificate_no'] != '') {
							if ($this->certificate_model->isExistByNo($certificate_no)) {

								//echo "sd";exit;
								$certificate_id = $this->certificate_model->getcertificatebyNo($certificate_no);
                            	$this->certificate_model->update_certificate($certificate_id, $data);
							}else{

								//echo "sdsdsd";exit;
								$data['added_date'] = date('Y-m-d');
								$data['subid'] = $subid;
								$certificate_id = $this->certificate_model->addcertificateData($data);
							}	
                        }
                    }
                }
            }
            $this->session->set_flashdata('L_strErrorMessage', 'Your Data File Uploaded Successfully.!!');
            redirect($this->config->item('base_url') . 'certificate/lists');
        }
        $data = array();
        $this->load->view('upload_certificate', $data);
    }

	function course_certificate($id)
	{
		$data['detail'] = $this->certificate_model->get_certificateData($id);  
		//echo "<pre>";print_r($data['detail']);echo"</pre>";
		$this->load->view('course_certificate',$data);
	}
	
	function lng_certificate($id)
	{
		$data['detail'] = $this->certificate_model->get_certificateData($id);  
		//echo "<pre>";print_r($data['detail']);echo"</pre>";
		$this->load->view('lng_certificate',$data);
	}

	function checkCertiNo()
	{
		$certificate_no = $_POST['certificate_no'];
		$data = $this->certificate_model->checkCertiNo($certificate_no);
		if($data !=""){
			echo "0"; die;
		}else
		{
			echo "1"; die;
		}
	}

	function getDescription()
	{
		$course_id = $_POST['course_id'];
		$data = $this->certificate_model->getDescription($course_id);
		$html = "";
		$html .= "<textarea id='editorDescpOne' name='description1'>".$data."</textarea>";
		echo $html;
	}
}