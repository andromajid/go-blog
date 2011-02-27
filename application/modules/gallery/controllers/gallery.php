<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of gallery
 *
 * @author andro
 */
class gallery extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gallery_model');
    }
	
	public function index()
	{
		$this->category();
	}
    public function category()
    {
        $this->data['picture'] = FALSE;
        if($this->uri->segment(3,0))
        {
            $this->data['picture'] = $this->gallery_model->get_picture_by_category($this->uri->segment(3));
        }
        $this->data['extra_head_content'] = ' <script type="text/JavaScript">
                                                <!--
                                                function MM_jumpMenu(targ,selObj,restore){ //v3.0
                                                  eval(targ+".location=\'"+selObj.options[selObj.selectedIndex].value+"\'");
                                                  if (restore) selObj.selectedIndex=0;
                                                }
                                                //-->
                                                </script>';
        $this->data['extra_head_content'] .= '<link rel="stylesheet" href="'.$this->config->item("themes_url").'/view/engine/css/vlightbox.css" type="text/css" />
                                                <style type="text/css">#vlightbox a#vlb{display:none}</style>
                                                <link rel="stylesheet" href="'.$this->config->item("themes_url").'/view/engine/css/visuallightbox.css" type="text/css" media="screen" />';
        $this->data['extra_head_content'] .= "<script type=\"text/javascript\" src=\"".base_url()."web/addons/js/jquery-1.3.2.min.js\"></script>";
        $this->data['category'] = $this->gallery_model->get_category();
        template($this->jenis,"view_gallery",$this->data);
    }
}
?>
