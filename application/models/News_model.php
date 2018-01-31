<?php
class News_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
		
	public function get_news($slug = FALSE)
	{
        if ($slug === FALSE)
        {
                $query = $this->db->get('cbt_qus');
                return $query->result_array();
        }

        $query = $this->db->get_where('cbt_qus', array('sessions' => $slug));
        return $query->row_array();
	}
}