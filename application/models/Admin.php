<?php
class Admin extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}
	function check_login($data) {
		$where_array = array(
						'email' => $data['username'],
						'password' => $data['password'],
						'status' => 0,
				);
		$query = $this->db->get_where('admin_user', $where_array);
		if ($query->num_rows() > 0)	{
			$row = $query->row();
			return $row;
		} else {
			return false;
		}
	}
	
	function get_user($id){

		$this->db->where('id = ',$id);
		$query = $this->db->get('admin_user');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function totalTrainer(){
		$query = $this->db->get('trainer');
		if ($query->num_rows() > 0)	{
			$result = $query->num_rows();
			return $result;
		} else {
			return false;
		}
	}

	function totalCandidate(){
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0)	{
			$result = $query->num_rows();
			return $result;
		} else {
			return false;
		}
	}

	function totalCourse(){
		$query = $this->db->get('course');
		if ($query->num_rows() > 0)	{
			$result = $query->num_rows();
			return $result;
		} else {
			return false;
		}
	}
 	
	function totalCertificate(){
		$query = $this->db->get('certificate');
		if ($query->num_rows() > 0)	{
			$result = $query->num_rows();
			return $result;
		} else {
			return false;
		}
	}

	function get_certificateData($id)
	{
		$sql = "SELECT c.*,t.*,ca.*,co.*,t.prefix as tprefix,ca.prefix as caprefix,c.id as cid from certificate c 
		LEFT JOIN trainer t ON c.trainer_id = t.id 
		LEFT JOIN candidate ca ON c.candidate_id = ca.id
		LEFT JOIN course co ON c.course_id = co.id  
		where c.id = '".$id."' ";

		$query = $this->db->query($sql);
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
		
	}
}
