<?php
namespace Hotpms\Helpers;
class DateHelper{
	public static function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d' ) {
	
		$dates = array();
		$current = strtotime($first);
		$last = strtotime($last);
	
		while( $current <= $last ) {
	
			$dates[] = date($output_format, $current);
			$current = strtotime($step, $current);
		}
	
		return $dates;
	}
	
	public static function isWeekend($date) {
		return (date('N', strtotime($date)) >= 6);
	}
}