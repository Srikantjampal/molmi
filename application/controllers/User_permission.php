<?php
class User_permission extends CI_Controller {
	private $_data = array();
	function __construct() {
		parent::__construct();
		if($this->session->userdata('adminId') == ''){
			redirect($this->config->item('base_url'));
		}
		$this->load->model('user_permission_model');
	}
	function lists()
	{
		$this->load->library('pagination');
		$url_to_paging = $this->config->item('base_url');
		$config['base_url'] = $url_to_paging.'user_permission/lists/';
		$config['per_page'] = '10000';
		$config['first_url']='0';
		$data = array();
		//using for searching data...
		$data['name'] = $this->input->post('name');
		$per_page = '1';
		$perpage = '3';
		//below is used in all perpose
		$return = $this->user_permission_model->lists($config['per_page'],$this->uri->segment(3), $data);
		$data['result'] = $return['result'];
		$config['total_rows'] = $return['count'];
		//echo "<pre>";print_r($data);break;
		$this->pagination->initialize($config);
		$this->load->view('list_user_permission', $data);

	}

	function add()
	{

		//$L_strErrorMessage='';
		$form_field = $data = array( 
				'name' => '',
				'email'=>'',			
				'password'=>'',
				'permission'=>'',
				'status'=>'',
			);

		if($this->input->post('action') == 'add_user_permission') 
		{
			foreach($form_field as $key => $value)
			{	
				$data[$key]=$this->input->post($key);	
			}

			$this->user_permission_model->add($data);

			$this->session->set_flashdata('L_strErrorMessage','User Added Successfully!!!!');

			redirect($this->config->item('base_url').'user_permission/lists');
		}
		$data['all_permission']= $this->user_permission_model->alldata("permission");
		$this->load->view('add_user_permission',$data);
	}

	function edit($id)
	{
		if(is_numeric($id))
			{
				$result = $this->user_permission_model->get_admin_user($id);  

				$form_field = $data = array(
					'L_strErrorMessage' => '',
					'id'	    =>$result[0]->id,
					'name'     =>$result[0]->name,
					'email'     =>$result[0]->email,											
					'password'       =>$result[0]->password,
					'permission'   =>$result[0]->permission,
					'status'=>$result[0]->status,
				);

				if($this->input->post('action') == 'edit_user_permission') 
				{
					foreach($data as $key => $value) 
					{
						$form_field[$key]=$this->input->post($key);	
					}
					
					$data = $form_field;
						$this->user_permission_model->edit($id, $form_field);
						$this->session->set_flashdata('L_strErrorMessage','User Updated Successfully!!!!');
						redirect($this->config->item('base_url').'user_permission/lists');
					
				}
				$data['all_permission']= $this->user_permission_model->alldata("permission");
				$this->load->view('edit_user_permission',$data);
			} 
			else 
			{
				$this->session->set_flashdata('L_strErrorMessage','No Such User  !!!!');
				redirect($this->config->item('base_url').'user_permission/lists');
			}
	}

	function checkemail()
	{
		$email = $_POST['email'];
		$data = $this->user_permission_model->checkemail($email);
		if($data !=""){
			echo "0"; die;
		}else
		{
			echo "1"; die;
		}
	}

	function my_profile()
	{	

		$L_strErrorMessage='';
		$data['err_msg'] = '';
		if($this->input->post("action")=="update_profile")
			{
				foreach($_POST as $key => $value)
				{
					$data[$key]=$this->input->post($key);
				}
				$content['email']  = $data['email'];
				$content['password']  = $data['password'];
				
				$this->user_permission_model->update_profile($content);
				$this->session->set_flashdata('L_strErrorMessage','Profile updated successfully.');
				redirect($this->config->item('base_url').'my-profile', 'location');
			}

		$data['profile'] = $this->user_permission_model->getuserdata($this->session->userdata('adminId'));
		$this->load->view('my_profile',$data);
	}
	 
}