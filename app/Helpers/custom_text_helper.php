<?php
 function asCurrency($number){

		$formattedNumber = number_format($number, 0, ',', '.');
  		return 'Rp ' . $formattedNumber;

	}

 function asNumber($text){

		$number = str_replace(array('Rp', '.', ','), '', $text);
  		return (int) $number;

	}
?>