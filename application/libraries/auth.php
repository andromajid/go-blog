<?php
/*
 * Class authentifikasi buat USER,ADMIN dan sama virtual office
 */
class auth
{
    var $CI = null;
    function __construct()
    {
        $this->CI = & get_instance();
        //$this->CI->load->model('system/system_model');
        $this->CI->load->library(array('session','function_lib'));
        $this->data_session = $this->CI->session->userdata('auth_admin');
    }

    function auth_admin()
    {
        if(! $this->CI->session->userdata('auth_admin')) return false;//cek session
        else return true;
    }

    function check_menu_privilage($uri)
    {
        //check apakah menu yang diakses sesuai dengan hak akses-nya
        $check_menu = $this->CI->function_lib->get_one('menu_id','site_menu m, site_menu_privilege p',"menu_id = privilege_menu_id AND privilege_admin_group_id = '".$this->data_session['admin_group_id']."' AND SUBSTRING_INDEX(menu_link,'/',2)='".$uri."' ");
        if($check_menu == "" ) return false;
        else return true;
    }

    function auth_voffice()
    {
        if(! $this->CI->session->userdata('member')) return false;
        else return true;
    }
}
?>
