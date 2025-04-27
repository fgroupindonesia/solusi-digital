<?php

namespace App\Libraries;


class DateHelper {

	public function asFormat($datena, $formatna){

		try {
        	$date = new \DateTime($datena);
        	return $date->format($formatna);
	    } catch (Exception $e) {
	        // In case of an invalid date
	        return "error";
	    }

	}

	public function getDayNameNow(){

		$todayEnglish = strtolower(date('l'));

		// map English day names to Indonesian
		$dayTranslation = [
		    "monday" => "senin",
		    "tuesday" => "selasa",
		    "wednesday" => "rabu",
		    "thursday" => "kamis",
		    "friday" => "jumat",
		    "saturday" => "sabtu",
		    "sunday" => "minggu"
		];

		// translate today's day
		$todayIndonesian = $dayTranslation[$todayEnglish];

		return $todayIndonesian;

	}

}

?>