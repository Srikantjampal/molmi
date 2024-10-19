<?php
class Topic extends CI_Controller {
	private $_data = array();
	function __construct() {
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
		}
		$this->load->model('topic_model');
	}
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'topic/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['name'] = $this->input->post('name');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->topic_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_topic', $data);

	}

	function add()
	{

		//$L_strErrorMessage='';
		$form_field = $data = array( 
				'name' => '',
			);

		if($this->input->post('action') == 'add_topic') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);	
			}

			$this->topic_model->add($data);

			$this->session->set_flashdata('L_strErrorMessage','Topic  Added Successfully!!!!');

			redirect($this->config->item('base_url').'topic/lists');
		}
		$this->load->view('add_topic',$data);
	}

	function edit($id)
	{
		if(is_numeric($id))
			{
				$result = $this->topic_model->get_topic($id);  

				$form_field = $data = array(
					'L_strErrorMessage' => '',
					'id'	    =>$result[0]->id,
					'name'     =>$result[0]->name,
				);

				if($this->input->post('action') == 'edit_topic') 
				{
					foreach($data as $key => $value) 
					{
						$form_field[$key]=$this->input->post($key);	
					}
					
					$data = $form_field;
					$this->topic_model->edit($id, $form_field);
					$this->session->set_flashdata('L_strErrorMessage','Topic Updated Successfully!!!!');
					redirect($this->config->item('base_url').'topic/lists');
					
				}
				
				$this->load->view('edit_topic',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such Topic !!!!');
				redirect($this->config->item('base_url').'topic/lists');
			}
	}
	
	function deleteEntry($id)
	{
		if($this->topic_model->deleteEntry($id))
				{
					$this->session->set_flashdata('L_strErrorMessage','Topic Deleted Successfully!!!!');
				}  
				else 
				{
					$this->session->set_flashdata('flashError','Some Errors prevented from Deleting!!!!');
				}
		redirect($this->config->item('base_url').'topic/lists');
	}
}