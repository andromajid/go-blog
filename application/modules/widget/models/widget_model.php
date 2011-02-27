<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widget_model
 *
 * @author andro
 */
class widget_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_all_widget()
    {
        $result = $this->db->get('site_widget');
        if($result->num_rows() > 0) return $result->result_array();
        else return FALSE;
    }

    public function update($widget_id,$data)
    {
        $this->db->where('widget_id',$widget_id);
        $return = $this->db->update('site_widget',$data);
        return $return;
    }
    function get_widget($location)
    {
        $this->db->where('widget_is_active','1');
        $this->db->where('widget_location',$location);
        $this->db->order_by('widget_order_by','ASC');
        $result = $this->db->get('site_widget');
        if($result->num_rows() > 0) return $result->result_array();
        else return FALSE;
    }

    public function get_widget_by_id($widget_id)
    {
        $this->db->where('widget_id',$widget_id);
        $result = $this->db->get('site_widget');
        if($result->num_rows() > 0) return $result->row_array();
        else return FALSE;
    }
}
?>
