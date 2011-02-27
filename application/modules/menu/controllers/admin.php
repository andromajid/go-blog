<?php
if( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * class admin buat manajemen menu
 * location: modules/menu/controllers/admin
 */
class admin extends Admin_Controller
{
    
    function __construct()
    {
        parent::__construct();
        //$this->output->enable_profiler('TRUE');
        $this->load->model("menu_model");
        $this->load->library('function_lib');
    }
/*-------------------------------------------------------------------------------
 * Funsi Index
 * ------------------------------------------------------------------------------
 */
    function index()
    {
        $this->list_menu();
    }
/*-------------------------------------------------------------------------------
 * Daftar menu
 * ------------------------------------------------------------------------------
 */
    function list_menu()
    {
        if($this->input->post('form_add'))//tambah data
        {
            $uri = $this->uri->segment(5)?"admin/menu/add_menu_admin/".$this->uri->segment(4)."/".$this->uri->segment(5):"admin/menu/add_menu_admin/".$this->uri->segment(4);//ambil uri ke empat yaitu menu_id
            redirect($uri);
        }
        elseif($this->input->post('delete'))//actioon hapus
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $this->menu_model->delete_menu($value);
                }
            }
            else $this->data['error'] .= "data belum dipilih";
        }
        elseif($this->input->post('publish'))//action diterbitkan
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('menu_is_active' => '1');
                    $this->menu_model->update_menu($data_update,$value);
                }
            }
            else
            {
                $this->data['error'] .= "data belum dipilih";
            }
        }
        elseif($this->input->post('unpublish'))//action tidak di terbitkan
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('menu_is_active' => '0');
                    $this->menu_model->update_menu($data_update,$value);
                }
            }
            else
            {
                //$this->session->set_flashdata("error","data belum dipilih");
                $this->data['error'] .= "data belum dipilih";
            }
        }
        elseif($this->input->post('order'))
        {
            foreach($this->input->post('order') as $id => $val)
            {
                if($val == 'up')
                {
                  $condition = '<=';
                  $sort = 'DESC';
                }
                elseif($val == 'down')
                {
                  $condition = '>=';
                  $sort = 'ASC';
                }
                $order_by = $this->function_lib->get_one("menu_order_by","site_menu","menu_id=".$id);
                $data_menu = $this->menu_model->get_menu_for_update($condition,$order_by,$id,$sort);//cari data menu atasnya atau bawahnya
                $data_update = array('menu_order_by' => $order_by);//data update yang pertama
                $this->menu_model->update_menu($data_update,$data_menu->menu_id);//update menu atasnya atau bawahnya
                $data_update_2 = array('menu_order_by' => $data_menu->menu_order_by);//data update yang ke dua
                $this->menu_model->update_menu($data_update_2,$id);//update menu
            }
        }
        $menu_parent = $this->uri->segment(5,0);//jika ngga ada uri segment yang ke tiga maka defaultnya 0
        $this->data['list_menu'] = $this->menu_model->get_admin_menu($menu_parent);
        template($this->jenis,"admin_menu_list",$this->data);
    }
/*-------------------------------------------------------------------------------
 * Tambah Menu
 * ------------------------------------------------------------------------------
 */
    function add_menu_admin()
    {
        if($this->input->post('create'))//tambah data menu admin
        {
            //form validasi dimulai
            $this->load->library('form_validation');
            //harus bernama $config
            $config = array(
               array(
                     'field'   => 'menu_title',
                     'label'   => 'menu_title',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'menu_link',
                     'label'   => 'menu_link',
                     'rules'   => 'required'
                  )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == TRUE)// ngga ada error
            {
                $order_by = $this->function_lib->get_one("menu_order_by","site_menu","menu_location = 'admin' ORDER BY menu_order_by DESC");
                if($order_by == '') $order_by = 0;
                $data_insert = array("menu_title" => $this->input->post('menu_title'),
                                     "menu_link" => $this->input->post('menu_link'),
                                     "menu_par_id" => $this->uri->segment(5,0),
                                     "menu_location" => $this->uri->segment(4),
                                     "menu_order_by" => $order_by + 1,
                                     "menu_is_active" => '1',
                                     "menu_description" => $this->input->post('menu_description'));
                $result = $this->menu_model->add_menu($data_insert);
                if($result) $this->data['pesan'] = "data berhasil ditambah";
                else $this->data['error'] = "data gagal ditambah";
            }
        }
        template($this->jenis,"admin_add_menu",$this->data);
    }
/*------------------------------------------------------------------------------
 * Edit Menu
 * -----------------------------------------------------------------------------
 */
    function edit()
    {
        if($this->input->post('edit'))
        {
            //form validasi dimulai
            $this->load->library('form_validation');
            //harus bernama $config
            $config = array(
               array(
                     'field'   => 'menu_title',
                     'label'   => 'menu_title',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'menu_link',
                     'label'   => 'menu_link',
                     'rules'   => 'required'
                  )
            );
            $this->form_validation->set_rules($config);//pasang configurasi validasi
            if ($this->form_validation->run() == TRUE)// ngga ada error
            {
                $data_update = array("menu_title" => $this->input->post('menu_title'),
                                     "menu_link" => $this->input->post('menu_link'),
                                     "menu_description" => $this->input->post('menu_description'));
                $result = $this->menu_model->update_menu($data_update,$this->uri->segment(4));
                if($result) $this->data['pesan'] = "data berhasil ditambah";
                else $this->data['error'] = "data gagal ditambah";
            }
            
        }
        $id = $this->uri->segment(4,0);
        $this->data['data_menu'] = $this->menu_model->get_menu_by_id($id);
        template($this->jenis,"admin_edit_menu",$this->data);
    }
}
?>
