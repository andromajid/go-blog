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
        $this->load->model('widget_model');
    }

    public function index()
    {
        $this->data['extra_head_content'] = "";
        $this->data['extra_head_content'] .= "<link href=\"".base_url()."web/addons/css/jqueryui/ui-lightness/jquery-ui-1.8.5.custom.css\" rel=\"stylesheet\" type=\"text/css\">";
        $this->data['extra_head_content'] .= "<script type=\"text/javascript\" src=\"".base_url()."web/addons/js/jquery-1.3.2.min.js\"></script>";
        $this->data['extra_head_content'] .= "<script type=\"text/javascript\" src=\"".base_url()."web/addons/js/jqueryui.js\"></script>";
        $this->data['extra_head_content'] .= "<script type=\"text/javascript\" src=\"".base_url()."web/addons/js/widget.js\"></script>";
        $this->template->add_extra_head_content($this->data['extra_head_content']);
        $this->data['widget'] = $this->widget_model->get_all_widget();
        $this->template->render("my_admin","admin_widget_list",$this->data);
    }

    public function ajax_change_widget()
    {
        
        $widget_id = $this->input->post('widget_id');
        $widget_location = $this->input->post('widget_location');
        if($widget_location == 'middle')
        {
            $data_update = array('widget_is_active' => '0');
        }
        else
        {
            $data_update = array('widget_is_active' => '1',
                                 'widget_location' => $widget_location);
        }
       $this->widget_model->update($widget_id,$data_update);
       echo("widget_id = ".$widget_id." lokasi = ".$widget_location);
    }

    public function ajax_get_widget()
    {
        $widget_id = $this->input->post('widget_id');
        $feedback = $this->widget_model->get_widget_by_id($widget_id);
        if($feedback)
        {
            //data yang akan diolah
            //$data = $feedback['widget_config'];
            $data = explode("|", $feedback['widget_config']);
            if($data[0] == "text")
            {
                $input = "<input type=\"text\" name=\"isi_data\" value=\"{$feedback['widget_content']}\" id=\"isi_data\"/>";
                $input .= "<br /><button class=\"submit\" id=\"woyo\" widget_id=\"{$feedback['widget_id']}\">Submit</button>";
            }
            echo $data[1]." = ".$input;
        }
    }

    public function ajax_update_widget()
    {
        $widget_id = $this->input->post('widget_id');
        $widget_content = $this->input->post('widget_content');
        $data_update = array('widget_content' => $widget_content);
        $feedback = $this->widget_model->update($widget_id,$widget_content);
        if($feedback)
        {
            echo "TRUE";
        }
        else echo "FALSE";
    }
}
?>
