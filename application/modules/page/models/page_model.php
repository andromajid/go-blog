<?php
class page_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_page($offset,$limit)
    {
        $this->db->where('page_location',$this->uri->segment(3));
        $this->db->limit($offset,$limit);
        $result = $this->db->get('site_page');
        if($result->num_rows() > 0) return $result->result();
        else return FALSE;
    }

    public function get_page_by_id($id)
    {
        $this->db->where("page_id",$id);
        $result = $this->db->get("site_page");
        if($result->num_rows() > 0) return $result->row();
        return FALSE;
    }
    
    public function update_page($data,$id)
    {
        if($this->uri->segment(3) !== "edit") $this->db->where('page_location',$this->uri->segment(3));
        $this->db->where('page_id',$id);
        $result = $this->db->update('site_page',$data);
        return $result;
    }
    
    public function delete_page($id)
    {
        $this->db->where('page_id',$id);
        $result = $this->db->delete('site_page');
        return $result;
    }

    public function insert_page($data)
    {
        $result = $this->db->insert("site_page",$data);
        return $result;
    }
}
?>
