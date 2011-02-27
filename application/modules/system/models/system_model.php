<?php
/*
 * Model buat system
 */
class system_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function act_login($user_name ,$password)
    {
        $this->db->select("*");
        $this->db->from('site_administrator');
        $this->db->where('admin_username',$user_name);
        $this->db->where('admin_password',md5($password));
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            $data = $result->row();//ambil datanya
            if($data->admin_is_active == 0)
            {
                return 2;
            }
            else
            {
                //masukkan ke session
                $session['auth_admin'] = array('admin_id'=> $data->admin_id,
                                               'admin_group_id' => $data->admin_group_id,
                                               'admin_username' => $data->admin_username,
                                               'admin_password' => $data->admin_password,
                                               'admin_last_login' => $data->admin_last_login,
                                               'admin_is_active' => $data->admin_is_active,
                                               'is_loged' => 1,
                                               'group_title' => $this->get_admin_title($data->admin_group_id)
                                               );
                $this->db->update('site_administrator',array('admin_last_login' => date('Y-m-d H:i:s')),array('admin_id'=> $data->admin_id));
                $this->session->set_userdata($session);
                return 3;
            }
        }
        else
        {
            return 1;
        }
    }
    
    function get_admin_title($id)
    {
        //ambil group title saja
        $this->db->select("admin_group_title");
        $this->db->from('site_administrator_group');
        $this->db->where('admin_group_id',$id);
        $result = $this->db->get();
        $data = $result->row();
        return $data->admin_group_title;
    }
/*------------------------------------------------------------------------------
 * function model buat lofin ke virtual office
 * -----------------------------------------------------------------------------
 */
    function act_login_virtual_office($mid,$password)
    {
        $this->db->from('sys_network');
        $this->db->join('sys_member','network_id = member_network_id','left');
        $this->db->join('sys_password','network_id = password_network_id','left');
        $this->db->where('network_mid',$mid);
        $this->db->where('password_value',md5($password));
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            $session['member'] = $result->row_array();
            $var = array('is_loged' => 1);
            $session['member'] = array_merge($session['member'],$var);
            $this->session->set_userdata($session);
            return true;
        }
        else return false;
    }
/*------------------------------------------------------------------------------
 * Function Di model buat menghandle group admin sama user admin
 * -----------------------------------------------------------------------------
 */
    function get_all_group()
    {
        $result = $this->db->get('site_administrator_group');
        if($result->num_rows() > 0) return $result->result();
    }
    function get_all_user()
    {
        $this->db->from('site_administrator c');
        $this->db->join('site_administrator_group a','c.admin_group_id = a.admin_group_id','left');
        $result = $this->db->get();
        if($result->num_rows() > 0) return $result->result();
    }
    function insert_group_admin($data)
    {
        $this->db->insert('site_administrator_group',$data);
    }
    function insert_user_admin($data)
    {
        $this->db->insert('site_administrator',$data);
    }
    function update_group($id,$data)
    {
        $this->db->where('admin_group_id',$id);
        $this->db->update('site_administrator_group',$data);
    }
    function insert_privilage($data)
    {
        $this->db->insert('site_menu_privilege',$data);
    }
    function delete_group_admin($id)
    {
        $this->db->where('admin_group_id',$id);
        $this->db->delete('site_administrator_group');
    }
    function delete_group_previlage($id)
    {
        $this->db->where('privilege_admin_group_id',$id);
        $this->db->delete('site_menu_privilege');
    }
    function get_group_menu($id = "")
    {
        $this->load->library('function_lib');
        $this->db->where('menu_location','admin');
        $this->db->where('menu_par_id','0');
        $this->db->where('menu_is_active','1');
        $result = $this->db->get('site_menu');
        $x = 0;
        $menu = array();
        $is_checked = "0";
        $res_menu = $result->result();
        foreach($res_menu as $hasil)
        {
            if($id !=="")
            {
                $check = $this->function_lib->get_one('privilege_admin_group_id','site_menu_privilege',"privilege_admin_group_id = '".$id."' AND privilege_menu_id = '".$hasil->menu_id."'");
                $is_checked = $check == ""?"0":"1";
            }
            $menu[$x]['menu_id'] = $hasil->menu_id;
            $menu[$x]['menu_title'] = $hasil->menu_title;
            $menu[$x]['menu_link'] = $hasil->menu_link;
            $menu[$x]['menu_description'] = $hasil->menu_description;
            $menu[$x]['is_checked'] = $is_checked;
            $hasil_child = $this->get_child_menu($hasil->menu_id,$id);//ambil menu anak
            if($hasil_child) $menu[$x]['child'] = $hasil_child;
            else $menu[$x]['child'] = array();
            $x++;
        }
        return $menu;
    }
    function get_child_menu($id,$check)
    {
        $is_checked = "0";
        $embuh = array();
        $data_final = array();
        $this->db->where('menu_location','admin');
        $this->db->where('menu_par_id',$id);
        $this->db->where('menu_is_active','1');
        $result = $this->db->get('site_menu');
        if($result->num_rows() > 0)
        {
            $row = $result->result_array();
            if($check !== "")
            {
                foreach($row as $sub)
                {
                    $check = $this->function_lib->get_one('privilege_admin_group_id','site_menu_privilege',"privilege_admin_group_id = '".$check."' AND privilege_menu_id = '".$sub['menu_id']."'");
                    $is_checked = $check == ""?"0":"1";
                    $data_check = array('is_checked' => $is_checked);
                    $data_final = array_merge($sub,$data_check);
                    $embuh[] = $data_final;
                }
                //die(print_r($embuh));
                $row = $embuh;
            }
            return $row;
        }
        else return false;
    }
    function is_checked($id)
    {
      $menu = $this->get_group_menu($id);
      return $menu;
    }
    function get_site_administrator($id)
    {
        $this->db->where('admin_group_id',$id);
        $result = $this->db->get('site_administrator_group');
        if($result->num_rows() > 0)
        {
            return $result->row();
        }
    }
    function get_user_by_id($id)
    {
        $this->db->from('site_administrator c');
        $this->db->join('site_administrator_group a','c.admin_group_id = a.admin_group_id','left');
        $this->db->where('admin_id',$id);
        $result = $this->db->get();
        if($result->num_rows() > 0)
        {
            return $result->row();
        }
    }

    function update_user_admin($id,$data)
    {
        $this->db->where('admin_id',$id);
        $result = $this->db->update('site_administrator',$data);
        return $result;
    }
	
	public function delete_user($id)
	{
		$this->db->where('admin_id',$id);
		$this->db->delete('site_administrator');
	}
	
	public function rekap()
	{
		$row = $this->db->query("SELECT network_id,network_sponsor_network_id,network_upline_network_id,DATE_FORMAT(member_join_datetime,'%Y-%m-%d') as tanggal FROM sys_network n LEFT JOIN sys_member m ON n.network_id = m.member_network_id ORDER BY network_id");
		if($row->num_rows() > 0) return $row->result_array();
		else return FALSE;
	}
}
?>
