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
        $this->load->model('gallery_model');
    }
/*
 * function buat gallery
 */
    public function index()
    {
        $this->daftar();
    }
    public function daftar()
    {
        if($this->input->post('form_add'))
        {
            redirect("admin/gallery/gallery_add");
        }
        elseif($this->input->post('delete'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $this->gallery_model->delete_gallery($value);
                }
            }
            else $this->data['error'] = "data belum dipilih";
        }
        elseif($this->input->post('publish'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('gallery_is_active' => '1');
                    $this->gallery_model->update_gallery($value,$data_update);
                }
            }
            else $this->data['error'] = "data belum dipilih";
        }
        elseif($this->input->post('unpublish'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $data_update = array('gallery_is_active' => '0');
                    $this->gallery_model->update_gallery($value,$data_update);
                }
            }
            else $this->data['error'] = "data belum dipilih";
        }
        $this->load->helper('pagination');
        $show = 10;//data yang akan ditampilkan(paging)
        $total = $this->gallery_model->get_count_gallery();
        $paging = create_pagination("admin/gallery/daftar/", $total,$show,4);
        $this->data['gallery'] = $this->gallery_model->get_paging_gallery($paging['limit'][0],$paging['limit'][1]);
        $this->data['paging'] = $paging['links'];
        $this->template->render("my_admin","admin_gallery_list",$this->data);
    }
    public function gallery_add()
    {
        if($this->input->post('add'))
        {
            $this->load->library("form_validation");
            $config = array(
               array(
                     'field'   => 'gallery_title',
                     'label'   => 'Judul Gambar',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'gallery_category_id',
                     'label'   => 'kategori gambar masih kosong',
                     'rules'   => 'required'
                  )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == TRUE)
            {
                /*
                 * setingan upload gambar
                 */
                $path = realpath( FCPATH.'asset/image');
                $config['upload_path'] = $path;
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']	= '1000';
                $config['remove_spaces']	= TRUE;
                $this->load->library('upload', $config);
                if(!$this->upload->do_upload('image'))
                {
                    $this->data['error'] = $this->upload->display_errors();
                }
                else
                {
                   $data = $this->upload->data();
                   $this->image_resize($data);
                   $data_insert = array('gallery_category_id' => $this->input->post('gallery_category_id'),
                                        'gallery_title' => $this->input->post('gallery_title'),
                                        'gallery_description' => $this->input->post('gallery_description'),
                                        'gallery_image' => $data['file_name'],
                                        'gallery_input_datetime' => date("Y-m-d h:i:s"));
                   $feedback = $this->gallery_model->insert_gallery($data_insert);
                   if(!$feedback) $this->data['error'] = "data image gagal disimpan silahkan upload ulang";
                   else $this->data['pesan'] = "data berhasil disimpan";
                }
            }
        }
        $this->data['category'] = $this->gallery_model->get_category();
        $this->template->render("my_admin","admin_gallery_add",$this->data);
    }
    public function edit($gallery_id)
    {
        if($this->input->post('edit'))
        {
            $this->load->library("form_validation");
            $config = array(
               array(
                     'field'   => 'gallery_title',
                     'label'   => 'Judul Gambar',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'gallery_category_id',
                     'label'   => 'kategori gambar masih kosong',
                     'rules'   => 'required'
                  )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == TRUE)
            {
                $img = array();
                if($_FILES['image']['tmp_name'] != "")
                {
                    $path = realpath( FCPATH.'asset/image');
                    $config['upload_path'] = $path;
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']	= '1000';
                    $config['remove_spaces']	= TRUE;
                    $this->load->library('upload', $config);
                    if(!$this->upload->do_upload('image'))
                    {
                        $this->data['error'] = $this->upload->display_errors();
                    }
                    else
                    {
                       $data = $this->upload->data();
                       $this->image_resize($data);
                       @unlink($path."/".$this->input->post('image_old'));
                       @unlink($path."/"."thumb_".$this->input->post('image_old'));
                       $img = array('gallery_image' => $data['file_name']);
                    }
                }
                $data_update = array('gallery_category_id' => $this->input->post('gallery_category_id'),
                                            'gallery_title' => $this->input->post('gallery_title'),
                                            'gallery_description' => $this->input->post('gallery_description'));
                $data_update = array_merge($data_update,$img);
               $feedback = $this->gallery_model->update_gallery($gallery_id ,$data_update);
               if(!$feedback) $this->data['error'] = "data image gagal disimpan silahkan upload ulang";
               else $this->data['pesan'] = "data berhasil disimpan";
                
            }
        }
        $this->data['kategori'] = $this->gallery_model->get_category();
        $this->data['row'] = $this->gallery_model->get_gallery_by_id($gallery_id);
        $this->template->render("my_admin","admin_gallery_edit",$this->data);
    }
    
    /*==========================================================================
     * FUNCTION BUAT CALLBACK 
     * =========================================================================
     */

    private function image_resize($image)
    {
        //die(print_r($image));
        $this->load->library('image_lib');
        $config = array(
                        'image_library' =>'GD2',
			'source_image' => $image['full_path'],
			'maintain_ratios' => true,
			'width' => 500,
			'height' => 500
		);
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
        $this->image_lib->clear();
        $config_thumb = array(
                        'image_library' =>'GD2',
			'source_image' => $image['full_path'],
                        'new_image' => $image['file_path']."thumb_".$image['file_name'],
			'maintain_ratios' => true,
			'width' => 100,
			'height' => 100
		);
       $this->image_lib->initialize($config_thumb);
       $this->image_lib->resize();
       $this->image_lib->clear();
    }
}
?>
