<?php
class Widget
{
    public $module_path;

    function run($file) {
        $args = func_get_args();

        $module = '';

        /* is module in filename? */
        if (($pos = strrpos($file, '/')) !== FALSE) {
            $module = substr($file, 0, $pos);
            $file = substr($file, $pos + 1);
        }

        list($path, $file) = Modules::find($file, $module, 'widgets/');

        if ($path === FALSE) {
            $path = APPPATH.'widgets/';
        }

        Modules::load_file($file, $path);

        $file = ucfirst($file);
        $widget = new $file();

        $widget->module_path = $path;

        return call_user_func_array(array($widget, 'run'), array_slice($args, 1));
    }

    function render($view, $data = array()) {
        extract($data);
        //ambil data dari theme
        $widget_view = array($this->template->get_template_url()."widget/".$view.EXT);//path pertama
        array_push($widget_view, $this->module_path.'views/'.$view.EXT);
        foreach($widget_view as $row)
        {
            if(file_exists($row))
            {
                include $row;
                break;
            }
        }
//        include $this->module_path.'views/'.$view.EXT;
    }

    function load($object) {
        $this->$object = load_class(ucfirst($object));
    }

    function __get($var) {
        global $CI;
        return $CI->$var;
    }
}
?>
