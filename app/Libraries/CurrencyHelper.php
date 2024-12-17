<?php

namespace App\Libraries;


class CurrencyHelper {

	public function asCurrency($number){

		$formattedNumber = number_format($number, 0, ',', '.');
  		return 'Rp ' . $formattedNumber;

	}

	public function asNumber($text){

		$number = str_replace(array('Rp', '.', ','), '', $text);
  		return (int) $number;

	}

}

?>