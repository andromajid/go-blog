<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
 * -------------------------------------------------------------------
 * Kumpulan script2 yang sering digunakan
 * -------------------------------------------------------------------
 */
class function_lib
{
    var $CI = null;

    function function_lib()
    {
        $this->CI = & get_instance();
        $this->CI->load->database();
    }

    function get_id($mid)
    {
        $result = $this->CI->db->query("SELECT network_id FROM sys_network WHERE network_mid = '".$mid."' limit 1");
        if($result->num_rows() > 0)
        {
            $row = $result->row();
            return $row->network_id;
        }
    }
    function get_mid($id)
    {
        $result = $this->CI->db->query("SELECT network_mid FROM sys_network WHERE network_id = '".$id."' LIMIT 1");
        if($result->num_rows() > 0)
        {
            $row = $result->row();
            return $row->network_mid;
        }
    }

    function get_one($field='',$table='',$where='')
    {
        $sql = "SELECT ".$field." FROM ".$table." WHERE ".$where." LIMIT 1";
        $result = $this->CI->db->query("SELECT ".$field." FROM ".$table." WHERE ".$where." LIMIT 1");
        if($result->num_rows() > 0)
        {
            $row = $result->row_array();
            return $row[$field];
        }
        else return "";
    }

    function get_name_from_mid($mid)
    {
        $id = $this->get_id($mid);
        return $this->get_name_from_id($id);
    }

    public function get_bank_name($id)
    {
        $bank_name = $this->get_one('bank_name', 'ref_bank', "bank_id = '{$id}'");
        return $bank_name;
    }
    function get_name_from_id($id)
    {
        $this->CI->db->select('member_name');
        $this->CI->db->where("member_network_id",$id);
        $result = $this->CI->db->get('sys_member');
        if($result->num_rows() > 0)
        {
            $row = $result->row();
            return $row->member_name;
        }
        else return "";
    }

    function insert_id()
    {
        $query = $this->CI->db->query('SELECT LAST_INSERT_ID()');
        $row = $query->row_array();
        return $row['LAST_INSERT_ID()'];
    }

    function get_area_name($area_id)
    {
        $result = $this->get_one("area_name","ref_area","area_id = '{$area_id}'");
        return $result;
    }
}
?>
