<?php

 $test =[];

$html = file_get_contents('https://www.mushroom-magazine.com/info/insane-festival-france/'); //get the html returned from the following url

$pokemon_doc = new DOMDocument();

libxml_use_internal_errors(TRUE); //disable libxml errors

if(!empty($html)){ //if any html is actually returned

	$pokemon_doc->loadHTML($html);
	libxml_clear_errors(); //remove errors for yucky html
	
	$pokemon_xpath = new DOMXPath($pokemon_doc);


	$pokemon_row = $pokemon_xpath->query('//div[@class="entry"]/p');
	
	if($pokemon_row->length > 0){
		foreach($pokemon_row as $row){

			//array_push($test, $row->nodeValue);
			$test['description'] = $test['description'].$row->nodeValue.' ';
		}
	}	

}


echo $pokemon_row->length;
//print_r($test);

//$test = array_column($test, 'nodeValue');
print_r($test);

?>


<!-- //working query
'//h2[@class="su-post-title"]/a/@href' -->


















