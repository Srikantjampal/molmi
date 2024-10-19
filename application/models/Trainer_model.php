<?php
class Trainer_model extends CI_Model
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
	}

	function add($content)
	{
		$L_strErrorMessage = '';
		$data['prefix'] = $content['prefix'];
		$data['officer'] = $content['officer'];
		$data['designation'] = $content['designation'];
		$data['trainer_name'] = $content['trainer_name'];
		$data['nationality'] = $content['nationality'];

		if ($content['digital_signature'] != '') {
			$data['digital_signature'] = $content['digital_signature'];
		}
		if ($content['profile_photo'] != '') {
			$data['profile_photo'] = $content['profile_photo'];
		}
		$this->_data = $data;
		if ($this->db->insert('trainer', $this->_data)) {
			return true;
		} else {
			return false;
		}
	}

	function edit($id, $content)
	{
		$data['prefix'] = $content['prefix'];
		$data['officer'] = $content['officer'];
		$data['designation'] = $content['designation'];
		$data['trainer_name'] = $content['trainer_name'];
		$data['nationality'] = $content['nationality'];
		if ($content['digital_signature'] != '') {
			$data['digital_signature'] = $content['digital_signature'];
		}
		if ($content['profile_photo'] != '') {
			$data['profile_photo'] = $content['profile_photo'];
		}

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('trainer', $this->_data)) {
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
		$sql = "SELECT * FROM  trainer where id <> 0 ";
		if ($content['name'] != '') {
			$sql .= " AND  (title like '%" . $content['name'] . "%' ) ";
		}
		if ($num != '' || $offset != '') {
			$sql .= "  order by id desc limit " . $offset . " , " . $num . " ";
		}
		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM trainer  WHERE id <> 0";
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
		if ($this->db->delete('trainer')) {
			return true;
		} else {
			return false;
		}
	}

	function get_trainer($id)
	{
		$this->db->where('id = ', $id);
		$query = $this->db->get('trainer');
		if ($query->num_rows() > 0) {
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function trainerlists()
	{
		$query = "SELECT * from trainer order by id desc";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			$result = $result->result();
			return $result;
		}

	}

	function addtrainerData($data)
	{
		if ($this->db->insert('trainer', $data)) {
			$trainer_id = $this->db->insert_id();
			return $trainer_id;
		}
		return false;
	}

	function check_trainer_login($data)
	{
		$where_array = array(
			'email' => $data['username'],
			'password' => $data['password'],
		);

		$this->db->where($where_array);
		$query = $this->db->get('trainer');
		if ($query->num_rows() > 0) {
			$row = $query->row();
			return $row;
		} else {
			return false;
		}
	}

	


}
