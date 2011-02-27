<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Class admin buat sysytem
 */
class admin extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('system_model');
    }

    function index()
    {
        $this->data['title'] = "admin area";
        template($this->jenis, "front", $this->data);
    }
//function buat manajemen USER
/*------------------------------------------------------------------------------
 *Function Group Administrator
 * -----------------------------------------------------------------------------
 */
    function group_admin()
    {
        //mulai aksi dari form
        if($this->input->post('form_add'))
        {
            redirect('admin/system/add_group_admin');
        }
        elseif($this->input->post('suspend'))
        {
            if(is_array($this->input->post('item')))
            {
				foreach($this->input->post('item') as $x => $value)
                {
                    $data_update = array('admin_group_is_active' => '0');
                    $this->system_model->update_group($value ,$data_update);
                }
            }
            else
            {
                $this->data['error'] = "data belum dipilih";
            }
        }
        elseif($this->input->post('activate'))
        {
            if(is_array($this->input->post('item')))
            {
				foreach($this->input->post('item') as $x => $value)
                {
                    $data_update = array('admin_group_is_active' => '1');
                    $this->system_model->update_group($value ,$data_update);
                }
            }
            else
            {
                $this->data['error'] = "data belum dipilih";
            }
        }
        elseif($this->input->post('delete'))
        {
            if(is_array($this->input->post('item')))
            {
                foreach($this->input->post('item') as $id => $value)
                {
                    $this->system_model->delete_group_admin($value);
                }
            }
            else
            {
                $this->data['error'] = "data belum dipilih";
            }
        }
        $this->data['group_list'] = $this->system_model->get_all_group();
        template($this->jenis,"admin_group_list",$this->data);
    }

    function add_group_admin()
    {
        $this->load->library('function_lib');
        $is_error = false;
        if($this->input->post('add'))
        {
            if(! $this->input->post('admin_group_title'))
            {
                $is_error = true;
                $this->data['error'] .= 'Nama Grup harus anda isi.';
            }
            if($is_error == FALSE)
            {
                $insert_group = array('admin_group_title' => $this->input->post('admin_group_title'));
                $this->system_model->insert_group_admin($insert_group);
                $last_insert_id = $this->function_lib->insert_id();
                if(is_array($this->input->post('item')))
                {
                  foreach($this->input->post('item') as $id => $value)
                  {
                      $insert_privilage = array('privilege_admin_group_id' => $last_insert_id,
                                                'privilege_menu_id' => $value);
                      $this->system_model->insert_privilage($insert_privilage);
                  }
                }
                $this->data['pesan'] = "group admin berhasil ditambahkan";
            }
        }
        $this->data['rowspan'] = $this->function_lib->get_one('COUNT(*)','site_menu',"menu_location = 'admin' AND menu_is_active = '1'");
        $this->data['group_menu'] = $this->system_model->get_group_menu();
        template($this->jenis,"admin_group_add",$this->data);
    }
/*------------------------------------------------------------------------------
 *Function edit group admin
 * -----------------------------------------------------------------------------
 */
    function edit_group($id)
    {
         $is_error = false;
         if($this->input->post('add'))
         {
            if(! $this->input->post('admin_group_title'))
            {
                $is_error = true;
                $this->data['error'] .= 'Nama Grup harus anda isi.';
            }
            if($is_error == FALSE)
            {
                $update_group = array('admin_group_title' => $this->input->post('admin_group_title'));
                $this->system_model->update_group($id,$update_group);
                $this->system_model->delete_group_previlage($id);
                if(is_array($this->input->post('item')))
                {
                  foreach($this->input->post('item') as $key => $value)
                  {
                      $insert_privilage = array('privilege_admin_group_id' => $id,
                                                'privilege_menu_id' => $value);
                      $this->system_model->insert_privilage($insert_privilage);
                  }
                }
                $this->data['pesan'] = "group admin berhasil diubah";
            }
         }
         $this->data['rowspan'] = $this->function_lib->get_one('COUNT(*)','site_menu',"menu_location = 'admin' AND menu_is_active = '1'");
         $this->data['group_menu'] = $this->system_model->is_checked($id);
         $this->data['admin'] = $this->system_model->get_site_administrator($id);
         template($this->jenis,"admin_group_edit",$this->data);
    }
/*------------------------------------------------------------------------------
 *Dibawah semua function yang akan menghandle user ADministrator
 * -----------------------------------------------------------------------------
 */
    function user()
    {
        if($this->input->post('form_add'))
        {
            redirect('admin/system/user_add');
        }
        elseif($this->input->post('suspend'))
        {
            if(is_array($this->input->post('item')))
            {
				foreach($this->input->post('item') as $x => $value)
                {
                    $data_update = array('admin_is_active' => '0');
                    $this->system_model->update_user_admin($value ,$data_update);
                }
            }
            else
            {
                $this->data['error'] = "data belum dipilih";
            }
        }
        elseif($this->input->post('activate'))
        {
            if(is_array($this->input->post('item')))
            {
				foreach($this->input->post('item') as $x => $value)
                {
                    $data_update = array('admin_is_active' => '1');
                    $this->system_model->update_user_admin($value ,$data_update);
                }
            }
            else
            {
                $this->data['error'] = "data belum dipilih";
            }
        }
        elseif($this->input->post('delete'))
        {
            if(is_array($this->input->post('item')))
            {
				foreach($this->input->post('item') as $x => $value)
                {
                    $this->system_model->delete_user($value);
                }
            }
            else
            {
                $this->data['error'] = "data belum dipilih";
            }
        }
        $this->data['user_list'] = $this->system_model->get_all_user();
        template($this->jenis,"admin_user_list",$this->data);
    }

    function user_add()
    {
        if($this->input->post('add'))
        {
            $this->load->library('form_validation');
            $config = array(
               array(
                     'field'   => 'admin_username',
                     'label'   => 'username',
                     'rules'   => 'required'
                  ),
               array(
                     'field'   => 'admin_password',
                     'label'   => 'password',
                     'rules'   => 'required|min_length[5]'
                  ),
                array(
                 'field'   => 'admin_password2',
                 'label'   => 'ulangi',
                 'rules'   => 'matches[admin_password]'
              )
            );
            $this->form_validation->set_rules($config);
            if ($this->form_validation->run() == TRUE)// ngga ada error
            {
                 $data_insert = array('admin_group_id' => $this->input->post('admin_group_id'),
                                      'admin_username' => $this->input->post('admin_username'),
                                      'admin_password' => $this->input->post('admin_password')
                                        );
                 $this->system_model->insert_user_admin($data_insert);
                 $this->data['pesan'] = "admin berhasil ditambahkan";
            }
        }
        $this->data['row_group'] = $this->system_model->get_all_group();
        template($this->jenis,"admin_user_add",$this->data);
    }
    
    function user_edit($id)
    {
        if($this->input->post('edit'))
        {
            $error = FALSE;
            if(!$this->input->post('admin_username'))
            {
                $error = TRUE;
                $this->data['error'] = "username kosong";
            }
            if(!$error)
            {
                $data_update = array('admin_username' => $this->input->post('admin_username'),
                                     'admin_group_id' => $this->input->post('admin_group_id'));
                $result = $this->system_model->update_user_admin($id,$data_update);
                if($result) $this->data['pesan'] = "admin berhasil diubah";
                else $this->data['error'] = "admin gagal diubah";
            }
        }
        $this->data['user_admin'] = $this->system_model->get_user_by_id($id);
        $this->data['row_group'] = $this->system_model->get_all_group();
        template($this->jenis,"admin_user_edit",$this->data);
    }
    
    function user_edit_password($id)
    {
        if($this->input->post('edit'))
        {
           $this->load->library('form_validation');
           $this->form_validation->set_rules('admin_password', 'Password', 'required|min_length[5]');
           if($this->form_validation->run() == TRUE)
           {
               $data_update = array('admin_id' => $id,
                                    'admin_password' => md5($this->input->post('admin_password')));
               $result = $this->system_model->update_user_admin($id,$data_update);
               if($result) $this->data['pesan'] = "password admin berhasil diubah";
                else $this->data['error'] = "password admin gagal diubah";
           }
        }
        $this->data['user_admin'] = $this->system_model->get_user_by_id($id);
        template($this->jenis,"admin_password_edit",$this->data);
    }
}
?>
