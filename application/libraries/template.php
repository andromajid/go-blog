<?php
/**
 * Class yang akan Memanage Template dan asset-nya..
 * @author appleseed
 * @date 27-februari-2011
 */
class template
{
    public $CI = null;
    private $extra_head_content = "";
    
    public function __construct()
    {
       $this->CI = & get_instance();
    }
/**
 *Method yang akan merender view yang disesuaikan dengan template yang dia miliki..
 */
    public function render($theme, $view, $data)
    {
        $data['extra_head_content'] = $this->extra_head_content;
        $module = $this->get_router();//view partial berada di module apa?
        $this->theme = $theme;
        $data['view'] = $module."/".$view;//view yang akan di includekan
        $this->CI->load->view($theme."/layout", $data);
    }
/**
 *Method Buat ambil router
 */
    public function get_router()
    {
        return $this->CI->router->fetch_module();
    }
/**
 * Method buat ambil theme yang dipakai
 */
    public function get_theme()
    {
        return $this->CI->config->item('themes');
    }
/**
 * Method buat cari url template berada
 */
    public function get_template_url()
    {
       return "application/views/{$this->theme}/";
    }
    public function get_template_full_url()
    {
       return $this->CI->config->item('base_url')."application/views/{$this->theme}/";
    }
/**
 * Method buat menambah css di extra head content
 * harus berada di folder asset
 */
    public function add_css($css_name)
    {
        $this->extra_head_content .= "<link href=\"asset/css/{$css_name}\" media=\"screen\" rel=\"stylesheet\" type=\"text/css\" />";
    }
    public function add_javascript($js_name)
    {
        $this->extra_head_content .= "<script src=\"asset/js/{$js_name}\" type=\"text/javascript\"></script>";
    }
    public function add_extra_head_content($content)
    {
        $this->extra_head_content .= $content;
    }
/**
 * Method di bawah buat ambil asset
 */
    public function get_image($image_name)
    {
      return "<img src=\"".$this->CI->config->item('base_url')."asset/image/".$image_name."\" alt=\"".$image_name."\" />";
    }
}
?>
