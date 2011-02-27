<?php

function convert_month($month, $lang = 'eng')
{
	$month = (int) $month;
	switch($lang)
	{
		case 'ina':
			$arr_month = array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','Nopember','Desember');
			break;

		default:
			$arr_month = array('January','February','March','April','May','June','July','August','September','October','November','December');
			break;
	}
	$month_converted = $arr_month[$month-1];

	return $month_converted;
}

function convert_date($date, $type = 'num', $format = '.', $lang = 'eng')
{
	if ($type == 'num')
	{
		$date = substr($date,0,10);
		$date_converted = str_replace('-', $format, $date);
	}
	else
	{
		$year = substr($date,0,4);
		$month = substr($date,5,2);
		$month = convert_month($month, $lang);
		$day = substr($date,8,2);

		$date_converted = $day . ' ' . $month . ' ' . $year;
	}

	return $date_converted;
}

