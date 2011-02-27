<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/* 
 * SUPER CLASS dari semua Modul Admin
 */
class Admin_Controller extends CI_Controller
{
    protected $jenis = "admin";
    protected $data = array();
    function __construct()
    {
        parent::__construct();
        //authentifikasi admin
        $this->output->enable_profiler(TRUE);
        if(! $this->auth->auth_admin())
        {
            redirect($this->config->item('base_url'));
        }
        elseif(! $this->auth->check_menu_privilage($this->uri->slash_segment(1).$this->uri->segment(2)) && $this->uri->uri_string() !== "admin")//memasukkan paramater uri semua misal index.php/admin/news yang dimasukkan admin/news/
        {
            //die();
            redirect("admin");
        }
        $this->data['error'] = "";
        $this->data['pesan'] = "";
    }
}
?>
