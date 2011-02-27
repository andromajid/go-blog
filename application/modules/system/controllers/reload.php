<?php
/*
 * class system yang akan memanage user admin
 */
class reload extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
		//$this->output->enable_profiler(TRUE);
        $this->load->model('reload_model');
		error_reporting(0);
    }

    function index()
    {
        parse_str($_SERVER['QUERY_STRING'],$_GET); //converts query string into global GET array variable
		$network_id = $this->function_lib->get_id($_GET['id']);
        $data_insert = array('reload_network_id' => $network_id,
							 'reload_trx' => $_GET['no_trx'],
							 'reload_datetime' => $_GET['tgl'],
							 'reload_mobilephone' => $_GET['nohp'],
							 'reload_message' => $_GET['pesan'],
							 'reload_op_reply' => $_GET['op'],
							 'reload_price' => $_GET['harga'],
							 'reload_status' => $_GET['status']);
		$feedback = $this->reload_model->insert_reload($data_insert);
		if($feedback)
		{
			echo "sukses";
		}
		else echo "gagal";
    }
    
	public function update()
	{
		parse_str($_SERVER['QUERY_STRING'],$_GET); //converts query string into global GET array variable
		$no_trx = $_GET['no_trx'];
		$status = $_GET['status'];
		$data_update = array('reload_status' => $status);
		$feedback = $this->reload_model->update_reload($data_update,$no_trx);
		if($feedback)
		{
			echo "sukses diupdate";
		}
		else
		{
			echo "gagal diupdate";
		}
	}
}
?>
