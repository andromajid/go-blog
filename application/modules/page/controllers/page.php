<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of page
 *
 * @author andro
 */
class page extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('page_model');
    }

    public function view($id)
    {
        $this->data['page'] = $this->page_model->get_page_by_id($id);
        $this->data['title'] = $this->data['page']->page_title;
        template($this->jenis,"page_view",$this->data);
    }
}
?>
