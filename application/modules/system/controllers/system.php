<?php
/*
 * class system yang akan memanage user admin
 */
class system extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		//$this->output->enable_profiler(TRUE);
        $this->load->model('system_model');
    }

    function index()
    {
        $this->load->view('login');
    }
    
    function login()
    {
       if($this->input->post('admin_username')=="" && $this->input->post('admin_username')=="")//inputan kosong..
       {
           $this->data['error'] = "User Name dan password tidak boleh kosong";
       }
       else
       {
           $cek = $this->system_model->act_login($this->input->post('admin_username'),$this->input->post('admin_password'));//cek di model system
           switch($cek)
           {
               case 1 :
                    $this->data['error'] = "Username dan password anda salah";
               break;
               case 2 :
                   $this->data['error'] = "Admin Tidak Aktif";
               break;
               case 3 : //berhasil
                   redirect("admin");
               break;
               default:
                  $this->data['error'] = "Error";
               break;
           }
       }
       $this->load->view('login',$this->data);
    }

    function logout()
    {
        //bersihkan session
        $this->session->unset_userdata('auth_admin');
        redirect($this->config->item('base_url'));
    }
/*
 * Method buat referal di website
 */
    public function ref()
    {
        $member_mid = $this->uri->segment(2);
        $network_id = $this->function_lib->get_id($member_mid);
        if($network_id !=="")
        {
            $this->session->set_userdata('referal',$network_id);
        }
        redirect(base_url());
    }
	
	public function rekap()
	{
	/*
		$this->load->library('reg_lib');
		$result = $this->system_model->rekap();
		foreach($result as $row)
		{
			$this->reg_lib->update_node($row['network_id'],$row['network_upline_network_id'],$row['tanggal'],1);
			$this->reg_lib->update_sponsor($row['network_sponsor_network_id'],$row['tanggal']);
		}
		*/
	}
	
	public function calculate()
	{
	/*
		$this->load->model('cron/cron_model');
		$this->db->select('network_id');
        $result = $this->db->get('sys_network');
		$res = $result->result_array();
		foreach($res as $row)
		{
			$this->db->select_sum('netgrow_node_left_real','total_netgrow_node_left_real');
			$this->db->select_sum('netgrow_node_right_real','total_netgrow_node_right_real');
			$this->db->where('netgrow_network_id',$row['network_id']);
			$result = $this->db->get('sys_netgrow');
			if($result->num_rows() > 0 )
			{
				$row_node = $result->row_array();
				$node_left = $row_node['total_netgrow_node_left_real'];
                $node_right = $row_node['total_netgrow_node_right_real'];
                $data_update_node = array("network_node_left" => $node_left,
                                           "network_node_right" => $node_right);
                $this->cron_model->update('sys_network',$data_update_node,$row['network_id'],'network_id');
			}
		}
		*/
	}
	
	public function calculate_log()
	{
	/*
		$this->load->model(array('registrasi/registrasi_model','cron/cron_model'));
		$yesterday = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-1,date("Y") ));//tanggal 15
        $network_list = $this->cron_model->get_network();
        if($network_list)
        {
            foreach($network_list as $row)
            {
                $row_netgrow = $this->registrasi_model->get_netgrow_by_id($row->network_id,$yesterday);
                if($row_netgrow)
                {
                    //daftar bonus yang akan dimasukkan sys bonus log
                    $sponsor = $row_netgrow['netgrow_sponsor'];
                    $match = $row_netgrow['netgrow_match'];
                    $gen1 = $row_netgrow['netgrow_gen1'];
                    $gen2 = $row_netgrow['netgrow_gen2'];
                    $gen3 = $row_netgrow['netgrow_gen3'];
                    $crossline = $row_netgrow['netgrow_crossline'];
                    $upline = $row_netgrow['netgrow_upline'];
                    

                    ///kalikan dengan setingan komisi
                    $this->load->config('bonus');
                    $bonus_sponsor = $sponsor * $this->config->item('sponsor');
                    $bonus_match = $match * $this->config->item('pasangan');
                    $bonus_match_pulsa = $match * $this->config->item('pasangan_pulsa');
                    $array_gen = $this->config->item('gen');//di config beruapa array 2 dimensi
                    $bonus_gen1 = $gen1 * $array_gen[1];
                    $bonus_gen2 = $gen2 * $array_gen[2];
                    $bonus_gen3 = $gen3 * $array_gen[3];
                    $bonus_crossline = $crossline * $this->config->item('crossline');
                    $bonus_upline = $upline * $this->config->item('upline');
                    //masukkan ke table insert bonus log
                    $data_insert_bonus_log = array("bonus_log_network_id" => $row->network_id,
                                                   "bonus_log_sponsor" => $bonus_sponsor,
                                                   "bonus_log_match" => $bonus_match,
                                                   "bonus_log_match_pulsa" => $bonus_match_pulsa,
                                                   "bonus_log_gen1" => $bonus_gen1,
                                                   "bonus_log_gen2" => $bonus_gen2,
                                                   "bonus_log_gen3" => $bonus_gen3,
                                                   "bonus_log_crossline" => $bonus_crossline,
                                                   "bonus_log_upline" => $bonus_upline,
                                                   "bonus_log_date" => $yesterday);
                    $this->cron_model->insert('sys_bonus_log',$data_insert_bonus_log);
                }
            }
        }
		*/
	}
}
?>
