<?php
class Course_model extends CI_Model
{
	private $_data = array();
	function __construct()
	{
		parent::__construct();
	}

	function add($content)
	{
		$L_strErrorMessage = '';
		$data['topic'] = $content['topic'];
		$data['course_name'] = $content['course_name'];
		//$data['start_serial'] = $content['start_serial'];
		//$data['cdc_passport'] = $content['cdc_passport'];
		//$data['cert_competency'] = $content['cert_competency'];
		$data['description1'] = $content['description1'];
		$data['remarks'] = $content['remarks'];
		$data['added_date'] = date('Y-m-d');

		$this->_data = $data;
		if ($this->db->insert('course', $this->_data)) {
			$id = $this->db->insert_id();
			// if(count($_POST['description']) > 0 && $_POST['description']!='')
			// { 
			// 	for($i=0;$i<count($_POST['description']);$i++) {
			// 		$content_add = array();
			// 		$content_add['cid'] = $id;
			// 		$content_add['description'] = $_POST['description'][$i];

			// 		$this->add_course_attr($content_add);
			// 	}
			// }
			return true;
		} else {
			return false;
		}
	}

	function add_course_attr($content)
	{
		$data['cid'] = $content['cid'];
		$data['description'] = $content['description'];

		$this->_data = $data;

		if ($this->db->insert('course_attribute', $this->_data)) {
			return true;
		} else {
			return false;
		}
	}

	function edit($id, $content)
	{
		$data['topic'] = $content['topic'];
		$data['course_name'] = $content['course_name'];
		//$data['start_serial'] = $content['start_serial'];
		//$data['cdc_passport'] = $content['cdc_passport'];
		//$data['cert_competency'] = $content['cert_competency'];
		$data['description1'] = $content['description1'];
		$data['remarks'] = $content['remarks'];
		$data['primary_trainer_id'] = $content['primary_trainer_id'];
		$data['secondary_trainer_id'] = $content['secondary_trainer_id'];

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('course', $this->_data)) {
			// echo "<pre>";
			// print_r("updated");die;
			// if ($_POST['description1'] != '' && count($_POST['description1']) > 0) {
			// 	for ($i = 0; $i < count($_POST['description1']); $i++) {
			// 		if ($_POST['description1'][$i] != '') {
			// 			$content1['cid'] = $id;
			// 			$content1['description'] = $_POST['description1'][$i];
			// 			$this->add_course_attr($content1);
			// 		}
			// 	}
			// }
			// if (count($_POST['descriptionu']) > 0 && $_POST['descriptionu'] != '') {
			// 	for ($i = 0; $i < count($_POST['descriptionu']); $i++) {
			// 		$content2 = array();
			// 		$content2['cid'] = $id;
			// 		$content2['descriptionu'] = $_POST['descriptionu'][$i];
			// 		$content2['updateid1xxx'] = $_POST['updateid1xxx'][$i];

			// 		$this->update_attribute($content2);
			// 	}	
			// }
			return true;
		} else {
			return false;
		}
	}

	function update_attribute($content2)
	{

		$data1['cid'] = $content2['cid'];
		$data1['description'] = $content2['descriptionu'];

		$this->db->where('id =', $content2['updateid1xxx']);
		if ($this->db->update('course_attribute', $data1)) {
			return true;
		} else {
			return false;
		}

	}

	function addition_item_course($id)
	{
		$this->db->where('cid = ', $id);
		$query = $this->db->get('course_attribute');
		if ($query->num_rows() > 0) {
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function lists($num, $offset, $content)
	{
		if ($offset == '') {
			$offset = '0';
		}
		$sql = "SELECT * FROM  course where id <> 0 ";
		if ($content['name'] != '') {
			$sql .= " AND  (title like '%" . $content['name'] . "%' ) ";
		}
		if ($num != '' || $offset != '') {
			$sql .= "  order by id desc limit " . $offset . " , " . $num . " ";
		}
		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM course  WHERE id <> 0";
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
		if ($this->db->delete('course')) {
			$this->db->where('cid = ', $id);
			$this->db->delete('course_attribute');
			return true;
		} else {
			return false;
		}
	}

	function get_course($id)
	{
		$this->db->where('id = ', $id);
		$query = $this->db->get('course');
		if ($query->num_rows() > 0) {
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function removeattriute($cid, $id)
	{
		$this->db->where('cid = ', $cid);
		$this->db->where('id = ', $id);
		if ($this->db->delete('course_attribute')) {
			return true;
		} else {
			return false;
		}
	}

	function courselists()
	{
		$query = "SELECT * from course order by id desc";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0) {
			$result = $result->result();
			return $result;
		}
	}

	function isExistByname($course_name)
	{
		$this->db->where('course_name', $course_name);
		$query = $this->db->get('course');
		if ($query->num_rows() > 0) {
			return 1;
		} else {
			return 0;
		}
	}

	function getcoursebyname($course_name)
	{
		$this->db->where('course_name = ', $course_name);
		$query = $this->db->get('course');
		if ($query->num_rows() > 0) {
			$result = $query->row()->id;
			return $result;
		} else {
			return false;
		}
	}

	function update_course($course_id, $data)
	{
		$this->db->where('id', $course_id);
		$query = $this->db->update('course', $data);
		if ($query) {
			return true;
		} else {
			return false;
		}
	}

	function addcourseData($data)
	{
		if ($this->db->insert('course', $data)) {
			$course_id = $this->db->insert_id();
			return $course_id;
		}
		return false;
	}

	function alldata($table_name)
	{
		$query = $this->db->get($table_name);
		if ($query->num_rows() > 0) {
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

	function get_topic_name($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('topic');
		if ($query->num_rows() > 0) {
			$result = $query->row()->name;
			// print_r($result);
			return $result;
		} else {
			return false;
		}
	}

	function commangetid($table_name, $columname, $return, $id)
	{
		$this->db->where($columname, $id);
		$query = $this->db->get($table_name);
		if ($query->num_rows() > 0) {
			$result = $query->row()->$return;
			return $result;
		} else {
			return false;
		}
	}

	public function add_candidate($candidate_id, $course_id, $trainer_id)
	{
		if (!empty($candidate_id) && !empty($course_id)) {
			$this->db->where('candidate_id', $candidate_id);
			$this->db->where('course_id', $course_id);
			$query = $this->db->get('courses_enrollment');

			if ($query->num_rows() > 0) {
				return false;
			} else {
				$data = array(
					'course_id' => $course_id,
					'candidate_id' => $candidate_id,
					'trainer_id' => $trainer_id,
				);

				$result = $this->db->insert('courses_enrollment', $data);

				if ($result) {
					return "Insertion successful!";
				} else {
					return "Insertion failed!";
				}
			}
		} else {
			return false;
		}
	}


	public function get_candidates_by_id($id)
	{
		if (!empty($id)) {
			$this->db->where('course_id', $id);
			$query = $this->db->get('courses_enrollment');

			if ($query->num_rows() > 0) {
				return $query->result();
			} else {
				return false;
			}
		} else {
			return false;
		}
	}


	public function delete_candidate($candidate_id, $course_id)
	{
		$this->db->where('candidate_id', $candidate_id);
		$this->db->where('course_id', $course_id);
		$this->db->delete('courses_enrollment');

		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}

	public function getAllcourseByTrainerId($trainerId) {
		$this->db->where('primary_trainer_id', $trainerId); 
		$query = $this->db->get('course');
	
		if ($query->num_rows() > 0) {
			return $query->result();
		}else{
			return false;
		}
	}
	
}
?>