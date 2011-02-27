<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_Config
 *
 * @author andro
 */
class MY_Config extends CI_Config{
    //put your code here
    	function site_url($uri = '')
	{
		if (is_array($uri))
		{
			$uri = implode('/', $uri);
		}

		if ($uri == '')
		{
			return $this->slash_item('base_url').$this->item('index_page');
		}
		else
		{
			// -- Old busted shit
			//$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			// -- end old busted shit

			// -- Hot newness
			if(strpos($uri, '|') > 0)
			{
				// Split the pipe
				list($uri, $suffix) = explode('|', $uri);

				// Dont forget the period
				$suffix = '.'.$suffix;
			}

			else
			{
				$suffix = ($this->item('url_suffix') == FALSE) ? '' : $this->item('url_suffix');
			}
			// -- end host newness

			return $this->slash_item('base_url').$this->slash_item('index_page').preg_replace("|^/*(.+?)/*$|", "\\1", $uri).$suffix;
		}
	}
        function set_item($item, $value, $index = '')
	{
		if ($index == '')
		{
			$this->config[$item] = $value;
		}
		else
		{
			$this->config[$index][$item] = $value;
		}
	}
}
?>
