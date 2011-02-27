<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of test
 *
 * @author andro
 */
class test extends Controller{
    //put your code here
    public function  __construct()
    {
        parent::Controller();
        $this->load->helper(array('template','form'));
    }
    public function index()
    {
        $t = $this->router->fetch_module();
        $data['title'] = "-Galaxy- Registrasi Step 1";
        template("registrasi","step1",$data);
        //$this->load->view("layout.main",$data);
    }
    public function hallo()
    {
        $kok = $this->uri->segment(5);
        echo $kok;
    }
}
?>
