<?php

$API_KEY='AIzaSyBwkYlVJRuB5-KKbyMhvW2EACdB1kco0zo';

//$address = "https://maps.google.com/maps/api/geocode/json?address=Hungary%20Csobánkapuszta%20Nograd&key=".$API_KEY;
//echo htmlspecialchars(file_get_contents($address));
//$address = "https://maps.google.com/maps/api/geocode/json?address=Hungary%20Csobánkapuszta%20Nograd&key=AIzaSyBwkYlVJRuB5-KKbyMhvW2EACdB1kco0zo";

//echo $address;
//print_r( htmlspecialchars(file_get_contents($address)));


//echo str_replace(' ', '%20' ,'test 1 test- 1');



function getCoordinates($address, $API_KEY){

	$address = str_replace(' ', '%20' , $address);
	$mapUrl = "https://maps.google.com/maps/api/geocode/json?address=".$address."&key=".$API_KEY;
	$result = json_decode(file_get_contents($mapUrl), true);

	$data['lat'] =  $result['results'][0]['geometry']['location']['lat'];
	$data['lng'] =  $result['results'][0]['geometry']['location']['lng'];
	$data['formatted_address'] =  $result['results'][0]['formatted_address'];
	return $data;

};





$address='Germany Teufelshof';

$x = (getCoordinates($address, $API_KEY)) ;

// $y = json_decode($x, true);

// echo $y['results'][0]['formatted_address'].'<br>'.'<br>';
// //print_r($y['results'][0]['geometry']['location']).'<br>'.'<br>';
// echo $y['results'][0]['geometry']['location']['lat'].'<br>';
// echo $y['results'][0]['geometry']['location']['lng'].'<br>';
// //echo $x;
var_dump($x);

?>




















