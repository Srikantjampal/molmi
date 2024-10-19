<?php
	class Topic_model extends CI_Model {
	private $_data = array();
	function __construct() {
		parent::__construct();
	}

	function add($content) 
	{
		$L_strErrorMessage='';
		$data['name'] = $content['name'];			
		$this->_data = $data;
		if ($this->db->insert('topic', $this->_data))	
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

		$this->_data = $data;
		$this->db->where('id', $id);
		if ($this->db->update('topic', $this->_data))	
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
		$sql = "SELECT * FROM  topic where id <> 0 ";
		if($content['name'] != '') 
		{
			$sql .=	" AND  (title like '%".$content['name']."%' ) "; 	
		}
		if($num!='' || $offset!='')
		{
			$sql .=	"  order by id desc limit ".$offset." , ".$num." ";
		}
		$query = $this->db->query($sql);
		$sql_count = "SELECT * FROM topic  WHERE id <> 0";
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
		if ($this->db->delete('topic'))
		{
			return true;
		} else
		{
			return false;
		}
	}

	function get_topic($id)
	{
		$this->db->where('id = ',$id);
		$query = $this->db->get('topic');
		if ($query->num_rows() > 0)	{
			$result = $query->result();
			return $result;
		} else 
		{
			return false;
		}
	}
}
