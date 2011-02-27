<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
 * Helper Buat template
 * 
 */
function template($jenis,$view,$data = array())
{
    $ci = &get_instance();//instance objek CI
    $module = $ci->router->fetch_module();//berada di module apa(ngambil alamat module)
    $theme = $ci->config->item('themes');//themes yang dipakai apa
    if($jenis=="admin")
    {
        $ci->load->model("menu/menu_model");
        $data['menu'] = $ci->menu_model->get_backend_menu();//ambil data menu
    }
    elseif($jenis == "view")
    {
        $ci->load->model("widget/widget_model");
        $data['widget_left'] = $ci->widget_model->get_widget('left');
        $data['widget_right'] = $ci->widget_model->get_widget('right');
    }
    $data['view'] = $module."/".$view;//view yang akan di includekan
    $ci->load->view($theme."/".$jenis,$data);//at last masukkan semua datanya
}
?>
