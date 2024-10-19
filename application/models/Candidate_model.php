<?php
class Candidate_model extends CI_Model
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function add($content)
	{
		$L_strErrorMessage = '';
		$data['candidate_name'] = $content['candidate_name'];
		$data['cdc_passport'] = $content['cdc_passport'];
		$data['cdc_password'] = $content['cdc_password'];
		$data['rank'] = $content['rank'];
		$data['prefix'] = $content['prefix'];
		$data['designation'] = $content['designation'];
		$data['dob'] = $content['dob'];
		$data['nationality'] = $content['nationality'];

		if ($content['profile_image'] != '') {
			$data['profile_image'] = $content['profile_image'];
		}
		$this->_data = $data;
		if ($this->db->insert('candidate', $this->_data)) {
			return true;
		} else {
			return false;
		}
	}

	function edit($id, $content)
	{
		$data['candidate_name'] = $content['candidate_name'];
		$data['cdc_passport'] = $content['cdc_passport'];
		$data['rank'] = $content['rank'];
		$data['prefix'] = $content['prefix'];
		$data['designation'] = $content['designation'];
		$data['dob'] = $content['dob'];
		$data['nationality'] = $content['nationality'];

		if ($content['profile_image'] != '') {
			$data['profile_image'] = $content['profile_image'];
		}

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('candidate', $this->_data)) {
			return true;
		} else {
			return false;
		}
	}

	function lists($num, $offset, $content)
	{
		if ($offset == '') {
			$offset = '0';
		}
		$sql = "SELECT * FROM  candidate where id <> 0 ";
		if ($content['name'] != '') {
			$sql .= " AND  (title like '%" . $content['name'] . "%' ) ";
		}
		if ($num != '' || $offset != '') {
			$sql .= "  order by id desc limit " . $offset . " , " . $num . " ";
		}
		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM candidate  WHERE id <> 0";
		if ($content['name'] != '') {
			$sql_count .= " AND `title` like '" . $content['name'] . "%'";
		}
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result();
		$ret['count'] = $query1->num_rows();
		return $ret;
	}
	function deleteEntry($id)
	{
		$this->db->where('id = ', $id);
		if ($this->db->delete('candidate')) {
			return true;
		} else {
			return false;
		}
	}

	function get_candidate($id)
	{
		$this->db->where('id = ', $id);
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0) {
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function get_candidate_name_by_Id($id)
	{
		if (!empty($id)) {
			$this->db->where('id', $id);

			$query = $this->db->get('candidate');


			if ($query->num_rows() > 0) {
				$result = $query->row()->candidate_name;
				return $result;
			} else {
				echo 'No rows found for the given ID.';
				return false;
			}
		} else {
			echo 'The provided ID is empty.';
			return false;
		}
	}


	function candidatelists()
	{
		$query = "SELECT * from candidate order by id desc";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			$result = $result->result();
			return $result;
		}
	}

	function isExistByrank($rank)
	{
		$this->db->where('rank', $rank);
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function getcandidatebyrank($rank)
	{
		$this->db->where('rank = ', $rank);
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0) {
			$result = $query->row()->id;
			return $result;
		} else {
			return false;
		}
	}

	function update_candidate($candidate_id, $data)
	{
		// echo "<pre>";
		// print_r($candidate_id);
		// print_r($data);die;
		$this->db->where('id', $candidate_id);
		$query = $this->db->update('candidate', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	public function check_existing_candidate($email, $whatsapp, $alternate_mobile, $cdc_passport)
	{
		$this->db->where('email', $email);
		$this->db->or_where('whatsapp', $whatsapp);
		$this->db->or_where('alternate_mobile', $alternate_mobile);
		$this->db->or_where('cdc_passport', $cdc_passport);

		$query = $this->db->get('candidate');
		print_r($query);
		// If a row is found, the candidate already exists
		if ($query->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function insert_registration($data)
	{
		$this->db->insert('candidate', $data);
		if ($this->db->affected_rows() > 0) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}



	function check_candidate_login($data)
	{
		$where_array = array(
			'email' => $data['username'],
			'password' => $data['password'],
		);

		$this->db->where($where_array);
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row;
		} else {
			return false;
		}
	}
}
