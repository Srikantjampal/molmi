<?php
	class User_permission_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}

	function add($content) 
	{
		$L_strErrorMessage='';
		$data['name'] = $content['name'];
		$data['email'] = $content['email'];
		$data['password'] = $content['password'];
		
		if($content['permission']!=''){
			$data['permission'] = implode(',',$content['permission']);
		}
		$data['status'] = $content['status'];
			
		$this->_data = $data;
		if ($this->db->insert('admin_user', $this->_data))	
		{
			return true;
		} 
		else 
		{
			return false;
		}
	}

	function edit($id, $content) 
	{
		$data['name'] = $content['name'];	
		$data['email'] = $content['email'];
		$data['password'] = $content['password'];
		
		if($content['permission']!=''){
			$data['permission'] = implode(',',$content['permission']);
		}else{
			$data['permission'] = "";
		}
		$data['status'] = $content['status'];			
		

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('admin_user', $this->_data))	
		{
			return true;
		} else 
		{
			return false;
		}
	}

    function lists($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}
		$sql = "SELECT * FROM  admin_user where id <> 0 ";
		if($content['name'] != '') 
		{
			$sql .=	" AND  (title like '%".$content['name']."%' ) "; 	
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}
		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM admin_user  WHERE id <> 0";
		if($content['name'] !='')
		{
			$sql_count .= " AND `title` like '".$content['name']."%'";	
		}
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}
	function get_admin_user($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('admin_user');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else 
		{
			return false;
		}
	}

	function alldata($table_name)
	{
		$query = $this->db->get($table_name);
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function checkemail($email)
		{
			$this->db->select('admin_user.id,admin_user.email');

			$this->db->where(array('email' => $email));
			$query = $this->db->get('admin_user');
			if($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}

	function get_permission_name($id)
		{
			 
			$query = "SELECT * from permission where id IN($id)";
			$result = $this->db->query($query);
			if ($result->num_rows() > 0)
			{
				$result = $result->result();
				return $result;
			}else
			{
				return false;
			}
		}

	function getuserdata($adminId)
		{	
			$sql = "SELECT * from admin_user where id='".$adminId."'";
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0)
			{
				$result = $query->row();
				return $result;
			}
		}

	function update_profile($data)
		{
			$content['email']  = $data['email']; 
			$content['password']  = $data['password']; 
	
			$this->db->where('id', $this->session->userdata('adminId'));	
			  if ($this->db->update('admin_user', $content))
				 {		
				return true;	
				}else{ 					  
				return false;	 
			}
		}
}
?>