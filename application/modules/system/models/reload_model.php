<?php
/*
 * Model buat system
 */
class reload_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
	
	public function insert_reload($data)
	{
		$result = $this->db->insert('reload_reseller_log',$data);
		return $result;
	}
	
	public function update_reload($data,$id_trx)
	{
		$this->db->where('reload_trx',$id_trx);
		$result = $this->db->update('reload_reseller_log',$data);
		return $result;
	}
}
?>
