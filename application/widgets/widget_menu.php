<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of widget_menu
 *
 * @author andro
 */
class widget_menu extends Widget
{
    public function run()
    {
        $this->load->model("menu/menu_model");
        $data['menu'] = $this->menu_model->get_backend_menu();//ambil data menu
        $this->render('widget_menu',$data);
    }

}
?>
