<?php

class Welcome extends Controller {

	function Welcome()
	{
		parent::Controller();	
	}
	
	function index()
	{
		$this->load->view('welcome_message');
	}

        public function curl()
        {
            $data ="<?xml version='1.0'?>
            <data>
            <idmember>M123</idmember>
            <nama>sonz</nama>
            <alamat>bandung</alamat>
            <nohp>0856248888569</nohp>
            <idsponsor>M125</idsponsor>
            <msg>registrasi</msg>
            </data>";

            $url = "http://115.178.55.111/zivonic_v/app/autoregweb.php";
            $ch = curl_init();    // initialize curl handle
            curl_setopt($ch, CURLOPT_URL,$url); // set url to post to
            curl_setopt($ch, CURLOPT_RETURNTRANSFER,1); // return into a variable
            curl_setopt($ch, CURLOPT_TIMEOUT, 4); // times out after 4s
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // add POST fields
            $result = curl_exec($ch); // run the whole process
            echo $result; //contains response from server
            // NO RESPONSE RECEIVED
        }

        public function test_curl()
        {
            $this->load->library('curl');
            $data ="<?xml version='1.0'?>
            <data>
            <idmember>M123</idmember>
            <nama>sonz</nama>
            <alamat>bandung</alamat>
            <nohp>0856248888569</nohp>
            <idsponsor>M125</idsponsor>
            <msg>registrasi</msg>
            </data>";
            $url = "http://115.178.55.111/zivonic_v/app/autoregweb.php";
            $this->curl->create($url);
            $this->curl->option('return_transfer',1);
            $this->curl->option('timeout',4);
            $this->curl->post($data);
            echo $this->curl->execute();
        }
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */