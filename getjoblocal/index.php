<?php

require('inc/config.php');

function crawley($url, $agent) {

	$ch = curl_init();

	$options = array(
		CURLOPT_URL => $url,
		CURLOPT_RETURNTRANSFER => TRUE,
		CURLOPT_FOLLOWLOCATION => TRUE,
		CURLOPT_AUTOREFERER => TRUE,
		CURLOPT_USERAGENT => $agent,
		CURLOPT_TIMEOUT => 1800
	);

	curl_setopt_array($ch, $options);

	$data = curl_exec($ch);

	if(!$data){
		echo "<br />cURL error number: " . curl_errno($ch);
		echo "<br />cURL error: " . curl_error($ch) . " on URL - " . $url;
		var_dump(curl_getinfo($ch));
		var_dump(curl_error($ch));
		exit;
	}

	curl_close($ch);

	return $data;
}

function scrape_between($data, $start, $end){
  $data = stristr($data, $start); // Stripping all data from before $start
  $data = substr($data, strlen($start));  // Stripping $start
  $stop = stripos($data, $end);   // Getting the position of the $end of the data to scrape
  $data = substr($data, 0, $stop);    // Stripping all data from after and including the $end of the data to scrape
  return $data;   // Returning the scraped data from the function
}

function match_keywords(/*array &*/$search, /*array &*/$keys) { 	// A function to replace the foreach keyword search
	$datamatch = NULL;
	foreach ($keys as $key) {	
		if (stripos($search, $key) !== false) {
			$datamatch = $search;
		}
	}
return $datamatch;
}

foreach ($domains as $domain) {
	
	// Define random user agent from included user agent array PHP file
	$useragent = $list[array_rand($list)];
	
	// Actually start scraping using the PHP cURL library
	$response_page = crawley($domain, $useragent);

	// List the city and category everytime we switch cities:
	$cat_title = scrape_between($response_page, 'class="reset">', '</a>');
	echo "<pre>" . $cat_title . "</pre>";

	$response_title = explode('class="result-row"', $response_page);

	foreach ($response_title as $response) {
		
		$date = scrape_between($response, 'datetime="',' ');
		$href = scrape_between($response, 'href="', '"'); //need to be before title
		$title = scrape_between($response, 'hdrlnk">', '<');

		//match_keywords($title, $keywords);
		foreach ($keywords as $key) {

			if (stripos($title, $key) !== false) {

			//Filter between local and surrounding area matches so that links are formatted correctly:
				if (strpos($href, '//') !== false) {
					
					$hrefz = explode("//", $href);
					$href = $hrefz[1];
			
					echo '<pre>' .  $date . ' Other match: ' . '<a href="http://' . $href . '" target="_blank">' . $title . '</a></pre>';
				
				} else {
			
					echo '<pre>' . $date . ' ' . '<a href="https://portland.craigslist.org' . $href . '" target="_blank">' . $title . '</a></pre>';
				}

		  } else {

			// Non matching results here, we do nothing and they are not echoed out
		 	// Need to match keywords while scraping, would increase efficiency drastically, versus returning all data 

			}

		}

	}

}
