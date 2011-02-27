<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery_model
 *
 * @author andro
 */
class gallery_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    /*
     * function buat kategori
     */
    public function get_category()
    {
        $result = $this->db->get('site_gallery_category');
        if($result->num_rows() > 0) return $result->result();
        else return FALSE;
    }

    public function get_category_by_id($id)
    {
        $this->db->where("gallery_category_id",$id);
        $result = $this->db->get("site_gallery_category");
        if($result->num_rows() > 0) return $result->row();
        else return FALSE;
    }
    
    public function insert_category($data)
    {
        $result = $this->db->insert("site_gallery_category",$data);
        return $result;
    }
    
    public function update_category($data,$id)
    {
        $this->db->where('gallery_category_id',$id);
        $result = $this->db->update('site_gallery_category',$data);
        return $result;
    }

    public function delete_category($id)
    {
        $this->db->where('gallery_category_id',$id);
        $result = $this->db->delete('site_gallery_category');
        return $result;
    }
    /*
     * method buat gallery
     */
    public function insert_gallery($data)
    {
        $result = $this->db->insert('site_gallery',$data);
        return $result;
    }
    public function get_count_gallery()
    {
        $result = $this->db->get('site_gallery');
        return $result->num_rows();
    }
    public function get_paging_gallery($offset,$limit)
    {
        $this->db->limit($offset,$limit);
        $result = $this->db->get('site_gallery');
        if($result->num_rows() > 0) return $result->result_array();
        else return FALSE;
    }
    public function delete_gallery($gallery_id)
    {
        $this->db->where('gallery_id',$gallery_id);
        $result = $this->db->delete('site_gallery');
    }
    public function update_gallery($gallery_id,$data)
    {
        $this->db->where('gallery_id',$gallery_id);
        $result = $this->db->update('site_gallery',$data);
        return $result;
    }
    public function get_gallery_by_id($gallery_id)
    {
        $this->db->where('gallery_id',$gallery_id);
        $result = $this->db->get('site_gallery');
        if($result->num_rows() > 0) return $result->row_array();
        else return FALSE;
    }

    public function get_picture_by_category($id)
    {
        $this->db->where('gallery_category_id',$id);
        $result = $this->db->get('site_gallery');
        if($result->num_rows() > 0 ) return $result->result_array();
        else return FALSE;
    }
}
?>
