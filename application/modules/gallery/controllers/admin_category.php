<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of category
 *
 * @author andro
 */
class admin_category extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gallery_model');
    }

    public function index()
    {
        if($this->input->post('form_add'))
        {
            redirect('admin/gallery/category/add/');
        }
        if($this->input->post('publish'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('gallery_category_is_active' => '1');
                    $this->gallery_model->update_category($data_update,$value);
                }
            }
        }
        if($this->input->post('unpublish'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('gallery_category_is_active' => '0');
                    $this->gallery_model->update_category($data_update,$value);
                }
            }
        }
        if($this->input->post('delete'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $this->gallery_model->delete_category($value);
                }
            }
        }
        $this->data['category'] = $this->gallery_model->get_category();
        template($this->jenis,"admin_category_list",$this->data);
    }

    public function add()
    {
        if($this->input->post('add'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("gallery_category_title","Nama Kategory","required");
            if($this->form_validation->run() == TRUE)
            {
                $data_insert = array("gallery_category_title" => $this->input->post('gallery_category_title'),
                                     "gallery_category_description" => $this->input->post('gallery_category_description'));
                $return = $this->gallery_model->insert_category($data_insert);
                if($return) $this->data['pesan'] = "data kategori berhasil ditambah";
                else $this->data['error'] = "data kategori gagal ditambah";
            }
        }
        template($this->jenis,"admin_category_add",$this->data);
    }

    public function edit($id)
    {
        if($this->input->post('ubah'))
        {
            $this->load->library('form_validation');
            $this->form_validation->set_rules("gallery_category_title","Nama Kategory","required");
            if($this->form_validation->run() == TRUE)
            {
                $data_update = array("gallery_category_title" => $this->input->post('gallery_category_title'),
                                     "gallery_category_description" => $this->input->post('gallery_category_description'));
                $return = $this->gallery_model->update_category($data_update,$id);
                if($return) $this->data['pesan'] = "data kategori berhasil diubah";
                else $this->data['error'] = "data kategori gagal diubah";
            }
        }
        $this->data['category'] = $this->gallery_model->get_category_by_id($id);
        template($this->jenis,"admin_category_edit",$this->data);
    }
}
?>
