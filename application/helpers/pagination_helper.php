<?php
if (!defined('BASEPATH')) exit('No direct script access allowed.');

function create_pagination($uri, $total_rows, $limit = NULL, $uri_segment = 4)
{
	$ci =& get_instance();
	$ci->load->library('pagination');

	$current_page = $ci->uri->segment($uri_segment, 0);
    $config['base_url'] = base_url().'/'.$uri.'/';

	$config['total_rows'] = $total_rows; // count all records
	$config['per_page'] = $limit === NULL ? $ci->settings->item('records_per_page') : $limit;
	$config['uri_segment'] = $uri_segment;
	$config['page_query_string'] = FALSE;

	$config['num_links'] = 4;

	$ci->pagination->initialize($config); // initialize pagination

	return array(
		'current_page' 	=> $current_page,
		'per_page' 		=> $config['per_page'],
		'limit'			=> array($config['per_page'], $current_page),
		'links' 		=> $ci->pagination->create_links()
	);
}
?>
