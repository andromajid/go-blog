<?php
/**
 * Class yang akan Memanage Template dan asset-nya..
 * @author appleseed
 * @date 27-februari-2011
 */
class template
{
    public $CI = null;
    public function __construct()
    {
       $this->CI = & get_instance();
    }
/**
 *Method yang akan merender view yang disesuaikan dengan template yang dia miliki..
 */
    public function render($theme, $view, $data)
    {
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
}
?>
