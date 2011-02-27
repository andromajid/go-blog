<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
 /*
 * percobaan menggunakan active record dengan menggunakan $this->db->query
 * menghasilkan selisih waktu yang sedikit
 * kesimpulan menggunakan active record saja
*/
class menu_model extends CI_Model
{
    private $data_session = "";
    
    function __construct()
    {
        parent::__construct();
        $this->data_session = $this->session->userdata("auth_admin");//ambil data session
    }
    
    function get_backend_menu()
    {
        //ambil semua menuid bersama hasil dari menu anaknya
        $this->db->from('site_menu a');
        $this->db->from('site_menu_privilege b');
        $this->db->where('a.menu_is_active','1');
        $this->db->where('a.menu_location','admin');
        $this->db->where('a.menu_par_id','0');
        $this->db->where('b.privilege_admin_group_id',$this->data_session['admin_group_id']);
        $this->db->where('a.menu_id','b.privilege_menu_id',false);
        $this->db->order_by('a.menu_order_by');
        $result = $this->db->get();
        $x = 0;
        $menu = array();
        $result = $result->result();
            foreach($result as $hasil)
            {
                $menu[$x]['menu_id'] = $hasil->menu_id;
                $menu[$x]['menu_title'] = $hasil->menu_title;
                $menu[$x]['menu_link'] = $hasil->menu_link;
                $hasil_child = $this->get_child_menu_admin($hasil->menu_id);//ambil menu anak
                if($hasil_child) $menu[$x]['child'] = $hasil_child;
                else $menu[$x]['child'] = array();
                $x++;
            }
            return $menu;
    }

    function get_frontend_menu()
    {
       $this->db->select('menu_title,menu_link');
       $this->db->from('site_menu');
       $this->db->where('menu_location','user');
       $this->db->where('menu_is_active','1');
       $this->db->order_by('menu_order_by');
       $result = $this->db->get();
       if ($result->num_rows() > 0) return $result->result();
    }
    
    function get_child_menu_admin($id)
    {
        //ambil menu child dari table site menu
        $this->db->from('site_menu a');
        $this->db->from('site_menu_privilege b');
        $this->db->where('a.menu_is_active','1');
        $this->db->where('a.menu_location','admin');
        $this->db->where('a.menu_par_id',$id);
        $this->db->where('b.privilege_admin_group_id',$this->data_session['admin_group_id']);
        $this->db->where('a.menu_id','b.privilege_menu_id',false);
        $this->db->order_by('a.menu_order_by');
        $result = $this->db->get();
        if($result->num_rows() > 0) return $result->result_array();
        else return false;
    }

    function get_admin_menu($menu_par_id = 0)
    {
        //ambil menu admin dengan paramater menu_parent_id
        $this->db->where('menu_location',$this->uri->segment(4));
        $this->db->where('menu_par_id',$menu_par_id);
        $this->db->order_by('menu_order_by');
        $result = $this->db->get('site_menu');
        if($result->num_rows() > 0)
        {
           return $result->result();
        }
    }
    
    function delete_menu($id)
    {
        $this->db->where("menu_id",$id);
        $result = $this->db->delete("site_menu");
        return $result;
    }

    function add_menu($data_insert)
    {
        $result = $this->db->insert("site_menu",$data_insert);
        return $result;
    }
    
    function update_menu($data_update,$id)
    {
        $this->db->where('menu_id',$id);
        $result = $this->db->update('site_menu',$data_update);
        return $result;
    }
    
    function get_menu_for_update($condition,$order_by,$id,$sort)
    {
        $this->db->select('menu_id, menu_order_by');
        $this->db->where('menu_order_by '.$condition,$order_by);
        $this->db->where('menu_id !=',$id);
        $this->db->where('menu_location',$this->uri->segment(4));
        $this->db->where('menu_par_id',$this->uri->segment(5,0));
        $this->db->order_by('menu_order_by',$sort);
        $this->db->limit(1);
        $result = $this->db->get('site_menu');
        if($result->num_rows > 0)
        {
            return $result->row();
        }
    }

    function get_menu_by_id($id)
    {
        $this->db->where("menu_id",$id);
        $result = $this->db->get("site_menu");
        if($result->num_rows() > 0 )
        {
            return $result->row();
        }
    }
}
?>
