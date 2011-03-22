<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author andro
 */
class admin extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
        //$this->output->enable_profiler(TRUE);
    }

    public function index()
    {
        
    }
/*
 * page generator buat user
 */
    public function user()
    {
        if($this->input->post('form_add'))
        {
            redirect('admin/page/add/'.$this->uri->segment(3));
        }
        if($this->input->post('publish'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('page_is_active' => '1');
                    $this->page_model->update_page($data_update,$value);
                }
            }
        }
        if($this->input->post('unpublish'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('page_is_active' => '0');
                    $this->page_model->update_page($data_update,$value);
                }
            }
        }
        if($this->input->post('delete'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $this->page_model->delete_page($value);
                }
            }
        }
        $this->load->helper('pagination');
        $total_page = $this->function_lib->get_one('COUNT(page_id)','site_page','page_location=\'user\'');
        $show = 15;
        $paging = create_pagination("admin/page/user", $total_page, $show, 4);
        $this->data['page'] = $this->page_model->get_page($paging['limit'][0],$paging['limit'][1]);
        $this->data['paging'] = $paging['links'];
        //template($this->jenis,"admin_page_list",$this->data);
        $this->template->render("my_admin","admin_page_list",$this->data);
    }
/*
 * page generator buat halaman member(VOFFICE)
 */
    public function member()
    {
        $this->user();
    }
/*
 * BUAT NAMBAH PAGE
 */
    public function add($type)
    {
        if($this->input->post('add'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("page_title","Judul","required");
            if($this->form_validation->run() == TRUE)
            {
                $data_insert = array("page_title" => $this->input->post('page_title'),
                                     "page_content" => $this->input->post('page_content'),
                                     "page_location" => $type);
                $this->page_model->insert_page($data_insert);
                $page_id = $this->db->insert_id();
                $order_by = $this->function_lib->get_one("menu_order_by",'site_menu',"menu_location = '{$type}' ORDER BY menu_order_by DESC");
                if($order_by == '') $order_by = 0;
                $this->load->model("menu/menu_model");
                $data_insert_menu = array("menu_title" => $this->input->post('page_title'),
                                           "menu_link" => "page/view/".$page_id,
                                          "menu_page_id" => $page_id,
                                          "menu_order_by" => $order_by + 1,
                                          "menu_location" => $type);
                $result = $this->menu_model->add_menu($data_insert_menu);
                if($result) $this->data['pesan'] = "data berhasil ditambahkan";
            }
        }
        $this->load->helper('xinha');
        $this->data['extra_head_content'] = xinha(array('page_content'));//ambil tinymce
        $this->template->add_extra_head_content($this->data['extra_head_content']);
        //template($this->jenis,"admin_add_page",$this->data);
        $this->template->render("my_admin","admin_add_page",$this->data);
    }

    public function edit($type,$id)
    {
        if($this->input->post('edit'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules('page_title',"judul","required");
            if($this->form_validation->run() == TRUE)
            {
                $data_update = array('page_title' => $this->input->post('page_title'),
                                     "page_content" => $this->input->post('page_content'));
                $result = $this->page_model->update_page($data_update,$id);
                if ($result) $this->data['pesan'] = "data berhasil diubah";
                else $this->data['error'] = "data gagal diubah";
            }
        }
        $this->load->helper('xinha');
        $this->data['extra_head_content'] = xinha(array('page_content'));//ambil tinymce
        $this->template->add_extra_head_content($this->data['extra_head_content']);
        $this->data['page'] = $this->page_model->get_page_by_id($id);
        //template($this->jenis,"admin_page_edit",$this->data);
        $this->template->render("my_admin","admin_page_edit",$this->data);
    }
}
?>
