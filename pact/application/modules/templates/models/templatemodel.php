<?php
class TemplateModel extends CI_Model
{
	private $tbl = 'email_templates';		
	
	public function get_template_by_id($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->tbl);
		return $query->row();
	}		
	
	public function load_template($slug)
	{
		$this->db->where('slug', $slug);
		$query = $this->db->get($this->tbl);
		return $query->row();
	}
	
	function parse_template($template, $param)
	{		
		foreach($param as $key=>$val)
		{
			$template = preg_replace("/\[".$key."\]/", $val, $template);
		}		
		return $template;
		
	}
}
?>