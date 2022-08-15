<?php 
/* Template Name: Quotes */ 


get_qoutes();


function get_qoutes(){
	for($i=0;$i<5;$i++) {
		$API_RESPONSE = file_get_contents('https://api.kanye.rest/');
		echo $i+1 . ' ';
		echo (json_decode($API_RESPONSE)->quote);
		echo "<br>";

	}	
}








