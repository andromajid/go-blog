<?php
/* 
 * Class Yang Menjadi Super Class dari Controller dari class controller biasa(frontend)
 */

class MY_Controller extends CI_Controller
{
    protected $jenis = "view";
    protected $data = array();
    function  __construct()
    {
        parent::__construct();
        $this->output->enable_profiler(TRUE);
        $this->data['error'] = "";
        $this->data['pesan'] = "";
        $this->load->helper('widget');
/*------------------------------------------------------------------------------
 * LOgin virtual office
 * -----------------------------------------------------------------------------
 */
        if($this->input->post('login_v_office'))
        {
            //validasi dimulai
            $this->load->library('form_validation');          
            $this->load->model('system/system_model');
            $message = "";
            $this->load->library('form_validation');
            $config = array(
               array(
                     'field'   => 'username',
                     'label'   => 'Username',
                     'rules'   => 'required|callback_check_username'
                  ),
                array(
                     'field'   => 'password',
                     'label'   => 'password',
                     'rules'   => 'required'
                  ),
                array(
                     'field'   => 'kode_unik',
                     'label'   => 'ulangi password',
                     'rules'   => 'callback_check_captcha'
                  )
            );
            $this->form_validation->set_rules($config);
            if($this->form_validation->run() == TRUE)
            {
                redirect("voffice");
            }
        }
    }
/*------------------------------------------------------------------------------
 * Function callback buat validasi
 * -----------------------------------------------------------------------------
 */
    function check_username($value)
    {
        $member_id = $value;//MID
        $password = $this->input->post('password');
        $check_login = $this->system_model->act_login_virtual_office($member_id,$password);//return true or false
        if(! $check_login)
        {
            $this->form_validation->set_message('check_username','member id atau password masih salah');
            return false;
        }
        else return true;
    }
    function check_captcha($value)
    {
        if($value == $_SESSION['captcha'])
        {
            return true;
        }
        else
        {
            $this->form_validation->set_message('check_captcha','Kode unik anda salah');
            return false;
        }
    }
}
?>
