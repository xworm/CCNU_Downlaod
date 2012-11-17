<?php
class Softs_model extends CI_Model {
	
	public function __construct()
	{
		$this->load->database();
	}
	
	/**
	 * Get Softs
	 * 
	 * @Author	Ichou	(2012.11.01)
	 * @param	Array	$param
	 * @return	Array
	 */
	public function get_softs($param = FALSE)
	{
		if($param === FALSE)
		{
			$query = $this->db->get('softs');
			return $query->result_array();
		}
		
		$this->db->from('softs');
		$param['select'] && $this->db->select($param['select']);
		$param['where'] && $this->db->where($param['where']);
		$param['limit'] && $this->db->limit($param['limit']);
		$param['order'] && $this->db->order_by($param['order']);
		
		$query = $this->db->get();
		$result = $query->result_array();
		
		foreach($result as $k=>$v){
			$v['soft_url'] && $result[$k]['soft_url'] = base_url().$v['soft_url'];
			$v['soft_img'] && $result[$k]['soft_img'] = base_url().$v['soft_img'];
		}
		
		return($result);

	}
	
	/**
	 * Get Top Softs by down_counts
	 * 
	 * @Author	Ichou	(2012.11.17)
	 * @param	integer	$num
	 * @param	integer	$tag	tag_id
	 * @return	Array
	 */
	public function get_top_softs($num = FALSE,$tag = FALSE)
	{
		if(! $num) return FALSE;
		
		$query = array(
						'select'=>'soft_name,ID',
						'limit'	=>$num,
						'order'	=>'down_count desc'
						);
		$tag && $query['where'] = 'tag_id ='.$tag;
		
		return $this->get_softs($query);
	}
}
	
	
/* End of file softs_model.php */
/* Location: ./application/models/softs_model.php */