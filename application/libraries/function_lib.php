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

    function insert_id()
    {
        $query = $this->CI->db->query('SELECT LAST_INSERT_ID()');
        $row = $query->row_array();
        return $row['LAST_INSERT_ID()'];
    }
}
?>
