<?php
	class Certificate_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}

	function add($candidateID,$content) 
	{
		$L_strErrorMessage='';
		$data['type'] = $content['type'];
		$data['topic'] = $content['topic'];
		$data['course_level'] = $content['course_level'];
		$data['course_id'] = $content['course_id'];
		$data['candidate_id'] = $candidateID;
		$data['location'] = $content['location'];
		$data['trainer_id'] = $content['trainer_id'];
		$data['status'] = $content['status'];
		$data['from_date'] = $content['from_date'];
		$data['to_date'] = $content['to_date'];
		$data['days'] = $content['days'];
		$data['issue_date'] = $content['issue_date'];
		$data['show_logo'] = $content['show_logo'];
		$data['description1'] = $content['description1'];
		$data['remarks'] = $content['remarks'];
		$data['added_date'] = date('Y-m-d');
		$cid = $this->get_subid($data['topic']);
		
		$cid_2 = $this->get_subid_2($data['topic'],$data['type']);
		
		$trainer_data = $this->get_trainer_id($data['trainer_id']);
		
		$candidate_data = $this->get_candidate_data($data['candidate_id']);
		
		//echo "<pre>";print_r($trainer_data->nationality);echo "</pre>";exit;
		$this->_data = $data;
		if ($this->db->insert('certificate', $this->_data))	
		{
			$id = $this->db->insert_id();

			if ($data['location'] == 'Online') {
				$locationShort = 'OL';
			} elseif ($data['location'] == 'Chennai') {
				$locationShort = 'CHN';
			} elseif ($data['location'] == 'Kolkata') {
				$locationShort = 'KOL';
			}elseif ($data['location'] == 'Mumbai') {
				$locationShort = 'MUM';
			}elseif ($data['location'] == 'Delhi') {
				$locationShort = 'DEL';
			}elseif ($data['location'] == 'MOLTC') {
				$locationShort = 'MOL';
			}
			else {
				$locationShort = strtoupper($data['location']);
				$locationShort = substr($locationShort, 0, 2);
			}

			$topicName = $this->get_topic_name($data['topic']);
			$topicName = strtoupper($topicName);

			
			
			$strtotimeShort =strtotime($data['issue_date']);
			$shortTime = date('Y',$strtotimeShort);
			$shortTime1 = date('Y',$strtotimeShort);

			//$shortTime = substr($shortTime, 0, 2);

			$shortTime = substr($shortTime, -2);

			$shortTime_new = date('Y',$strtotimeShort);
			
			
			$trainer_nation = strtoupper($trainer_data->nationality);
			$trainer_nation = substr($trainer_nation, 0, 2);
			
			$candidate_nation = strtoupper($candidate_data->nationality);
			$candidate_nation = substr($candidate_nation, 0, 2);
			
			if($data['type'] == 'Others'){
				
				$certiNoLastDigit = $cid+1;

				$certiNoLastDigit = sprintf('%04d', $certiNoLastDigit);

				$certificateNo = $topicName."/".$locationShort."/".$shortTime."/".$certiNoLastDigit;
				
			}else{
				
				$certiNoLastDigit = $cid_2+1;
				$certiNoLastDigit = sprintf('%04d', $certiNoLastDigit);
				// $certificateNo = "MOLTC (".$trainer_nation.")-".$topicName."".$shortTime1."-(".$candidate_nation.")".$certiNoLastDigit;

				$certificateNo = "MOLTC (".$trainer_nation.")- LNG".$shortTime_new."-(".$candidate_nation.")".$certiNoLastDigit;
			}
			
			//echo $certificateNo;exit;

			$data2['certificate_no'] = $certificateNo;
			$data2['subid'] = $certiNoLastDigit;
			$this->db->where('id', $id);
			$this->db->update('certificate', $data2);
			// if(count($_POST['description']) > 0 && $_POST['description']!='')
			// { 
			// 	for($i=0;$i<count($_POST['description']);$i++) {
			// 		$content_add = array();
			// 		$content_add['cid'] = $id;
			// 		$content_add['description'] = $_POST['description'][$i];

			// 		$this->add_certificate_attr($content_add);
			// 	}
			// }
			return true;
		} 
		else 
		{
			return false;
		}
	}

	function get_subid($topic)
	{
		$sql = "select * from certificate where topic = '".$topic."'  ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->row()->subid;
		}
		else
		{
			return false;
		}
	}
	
	
	function get_subid_2($topic,$type)
	{
		// $sql = "select * from certificate where topic = '".$topic."' and type = '".$type."' ORDER BY id DESC LIMIT 1";

		$sql = "select * from certificate where type = '".$type."' ORDER BY id DESC LIMIT 1";

		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->row()->subid;
		}
		else
		{
			return false;
		}
	}
	
	function get_trainer_id($trainer_id)
	{
		$sql = "select * from trainer where id = '".$trainer_id."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	function get_candidate_data($candidate_id)
	{
		$sql = "select * from candidate where id = '".$candidate_id."' ORDER BY id DESC LIMIT 1";
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	function certificateAllready($candidate_id,$course_id)
	{
		$sql = "select * from certificate where candidate_id = '".$candidate_id."' and course_id = '".$course_id."'";
		//echo $sql;
		$query = $this->db->query($sql);
		if($query->num_rows() > 0)
		{
			return $query->row();
		}
		else
		{
			return false;
		}
	}
	
	

	function add_certificate_attr($content)  
    {
		$data['cid'] = $content['cid'];
        $data['description'] = $content['description'];
       
        $this->_data = $data;
        
        if ($this->db->insert('certificate_attribute', $this->_data))   {
            return true;
        } else {
            return false;
        }
	}

	function edit($id, $content) 
	{
		$data['type'] = $content['type'];
		$data['topic'] = $content['topic'];
		$data['course_level'] = $content['course_level'];
		$data['course_id'] = $content['course_id'];
		$data['candidate_id'] = $content['candidate_id'];
		$data['location'] = $content['location'];
		$data['trainer_id'] = $content['trainer_id'];
		$data['status'] = $content['status'];
		$data['from_date'] = $content['from_date'];
		$data['to_date'] = $content['to_date'];
		$data['days'] = $content['days'];
		$data['issue_date'] = $content['issue_date'];
		$data['show_logo'] = $content['show_logo'];
		$data['description1'] = $content['description1'];
		$data['remarks'] = $content['remarks'];
		
		$data['certificate_no'] = $content['certificate_no'];

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('certificate', $this->_data))	
		{
			// if ($_POST['description1'] != '' && count($_POST['description1']) > 0) {
			// 	for ($i = 0; $i < count($_POST['description1']); $i++) {
			// 		if ($_POST['description1'][$i] != '') {
			// 			$content1['cid'] = $id;
			// 			$content1['description'] = $_POST['description1'][$i];
			// 			$this->add_certificate_attr($content1);
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
		} else 
		{
			return false;
		}
	}

	function update_attribute($content2) {

        $data1['cid'] = $content2['cid'];
		$data1['description'] = $content2['descriptionu'];
		
        $this->db->where('id =', $content2['updateid1xxx']);
        if ($this->db->update('certificate_attribute', $data1)) {
            return true;  
        } else {
            return false;
		}
		
	}

	function addition_item_certificate($id)
	{
 		$this->db->where('cid = ',$id);
		$query = $this->db->get('certificate_attribute');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else {
			return false;
		}
	}

    function lists($num, $offset, $content) 
	{
		if($offset == '')
		{
			$offset = '0';
		}
		$sql = "SELECT * FROM  certificate where id <> 0 and status_new = 0 ";
		if($content['name'] != '') 
		{
			$sql .=	" AND  (title like '%".$content['name']."%' ) "; 	
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}
		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM certificate  WHERE id <> 0 and status_new = 0";
		if($content['name'] !='')
		{
			$sql_count .= " AND `title` like '".$content['name']."%'";	
		}
		$query1 = $this->db->query($sql_count);
		$ret['result'] = $query->result();
		$ret['count']  = $query1->num_rows();
	    return $ret;
	}
	function deleteEntry($id) 
	{
 		$this->db->where('id = ',$id);
		if ($this->db->delete('certificate'))
		{
			$this->db->where('cid = ', $id);
			$this->db->delete('certificate_attribute');
			return true;
		} else
		{
			return false;
		}
	}

	function get_certificate($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('certificate');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else 
		{
			return false;
		}
	}

	function removeattriute($cid, $id) {
        $this->db->where('cid = ', $cid);
        $this->db->where('id = ', $id);
        if ($this->db->delete('certificate_attribute')) {
            return true;
        } else {
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

	function get_candidate_name($id)
	{
 		$this->db->where('id = ',$id);
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->candidate_name;
			return $result;
		}
		else
		{
			return false;
		}
	}
	
	function get_candidate_name_list($id)
	{
 		$this->db->where('id = ',$id);
		$query = $this->db->get('candidate');
		if ($query->num_rows() > 0)
		{
			$result = $query->row();
			return $result;
		}
		else
		{
			return false;
		}
	}

	function get_trainer_name($id)
	{
 		$this->db->where('id = ',$id);
		$query = $this->db->get('trainer');
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->trainer_name;
			return $result;
		}
		else
		{
			return false;
		}
	}

	function get_course_name($id)
	{
 		$this->db->where('id = ',$id);
		$query = $this->db->get('course');
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->course_name;
			return $result;
		}
		else
		{
			return false;
		}
	}

	function certificatelists()
	{
		$query = "SELECT * from certificate order by id desc";
		$result = $this->db->query($query);
		if ($result->num_rows() > 0)
		{
			$result = $result->result();
			return $result;
		}
	}
	function commangetid($table_name,$columname,$return,$id)
	{
 		$this->db->where($columname,$id);
		$query = $this->db->get($table_name);
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->$return;
			return $result;
		}
		else
		{
			return false;
		}
	}

	function isExistByNo($certificate_no){
        $this->db->where('certificate_no', $certificate_no);
        $query = $this->db->get('certificate');
        if ($query->num_rows() > 0) {
            return 1;
        }else{
			return 0;
		}
    }

	function getcertificatebyNo($certificate_no)
	{
 		$this->db->where('certificate_no = ',$certificate_no);
		$query = $this->db->get('certificate');
		if ($query->num_rows() > 0)
		{
			$result = $query->row()->id;
			return $result;
		}
		else
		{
			return false;
		}
	}

	function update_certificate($certificate_id, $data)
	{
		$this->db->where('id',$certificate_id);
		$query=$this->db->update('certificate',$data);
		if($query)
		{
			return true;
		}else
		{
			return false;
		}	
	}

	function addcertificateData($data)
    {
        if ($this->db->insert('certificate', $data)) {
            $certificate_id = $this->db->insert_id();
            return $certificate_id;
        }
        return false;
    }

	function get_certificateData($id)
	{
		$sql = "SELECT c.*,t.*,ca.*,co.*,t.prefix as tprefix,ca.prefix as caprefix,c.id as cid,c.description1 as certi_description from certificate c 
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

	function checkCertiNo($certificate_no)
		{
			$this->db->select('certificate.id,certificate.certificate_no');

			$this->db->where(array('certificate_no' => $certificate_no));
			$query = $this->db->get('certificate');
			if($query->num_rows() > 0)
			{
				return $query->row();
			}
			else
			{
				return false;
			}
		}
	function getDescription($course_id)
		{
			 $this->db->where('id = ',$course_id);
			$query = $this->db->get('course');
			if ($query->num_rows() > 0)
			{
				$result = $query->row()->description1;
				return $result;
			}
			else
			{
				return false;
			}
		}
	function get_topic_name($id)
		{
			 $this->db->where('id = ',$id);
			$query = $this->db->get('topic');
			if ($query->num_rows() > 0)
			{
				$result = $query->row()->name;
				return $result;
			}
			else
			{
				return false;
			}
		}
}
?>