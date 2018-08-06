<?php

$API_KEY='AIzaSyBwkYlVJRuB5-KKbyMhvW2EACdB1kco0zo';

$html = file_get_contents('https://www.mushroom-magazine.com/festivalmap/'); //get the html returned from the following url

$doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

$links=[];

if(!empty($html)){ //if any html is actually returned

	$doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$xpath = new DOMXPath($doc);


	$row = $xpath->query('//h2[@class="su-post-title"]/a/@href');
	
	if($row->length > 0){
		foreach($row as $row){

			//array_push($test, $row->nodeValue);
			array_push($links, $row->nodeValue);
		}
	}	

}





//print_r($links);

function test($links){
$result=[];
	foreach ($links as $link) {

		$html = file_get_contents($link); //get the html returned from the following url
		$pokemon_doc = new DOMDocument();
		libxml_use_internal_errors(TRUE); //disable libxml errors

		if(!empty($html)){ //if any html is actually returned

			$pokemon_doc->loadHTML($html);
			libxml_clear_errors(); //remove errors for yucky html
			
			$pokemon_xpath = new DOMXPath($pokemon_doc);

			//get all the h2's with an id
			$pokemon_row = $pokemon_xpath->query('//div[@class="info_country"]/h2');
			


			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					$test['name'] = $row->nodeValue;
					//echo $row->nodeValue . "<br/>";
				}
			}


			$pokemon_row = $pokemon_xpath->query('//div[@class="info_date"]');
			
			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					$test['date'] = $row->nodeValue;
					//echo $row->nodeValue . "<br/>";
				}
			}

			$pokemon_row = $pokemon_xpath->query('//div[@class="info_address"]/a/@href');
			
			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					$test['official-site'] = $row->nodeValue;
				}
			}


			$pokemon_row = $pokemon_xpath->query('//div[@class="info_venue"][1]');
			
			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					$test['country'] = $row->nodeValue;
				}
			}

			$pokemon_row = $pokemon_xpath->query('//div[@class="info_venue"]');
			
			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					$test['address'] = $test['address'].$row->nodeValue.' ';
				}
			}

			$pokemon_row = $pokemon_xpath->query('//div[@class="info_address"][1]');
			
			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					$test['address-2'] = $row->nodeValue.' ';
				}
			}

			$pokemon_row = $pokemon_xpath->query('//div[@class="entry"]/p');
			
			if($pokemon_row->length > 0){
				foreach($pokemon_row as $row){

					//array_push($test, $row->nodeValue);
					$test['description'] = $test['description'].$row->nodeValue.' ';
				}
			}

		}

		// function getCoordinates($address, $API_KEY){

		// 	$address = str_replace(' ', '%20' , $address);
		// 	$mapUrl = "https://maps.google.com/maps/api/geocode/json?address=".$address."&key=".$API_KEY;
		// 	$result = json_decode(file_get_contents($mapUrl), true);

		// 	$data['lat'] =  $result['results'][0]['geometry']['location']['lat'];
		// 	$data['lng'] =  $result['results'][0]['geometry']['location']['lng'];
		// 	$data['formatted_address'] =  $result['results'][0]['formatted_address'];
		// 	return $data;

		// };


		// $x = (getCoordinates($test['address'], $API_KEY)) ;


		array_push($result, $test);
	}

	return $result;
}

print_r(test($links));

?>





















