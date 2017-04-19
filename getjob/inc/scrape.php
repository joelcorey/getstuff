<?php
// require 'core/init.php'; A useless autoinclude file, currently missing
require_once('inc/config.php');

function crawley($url) {
  //to do:
  //add random useragent bot names and proxies
  //add rolling curl as to not spam websites.
  $ch = curl_init();
  $options = array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => TRUE,
    CURLOPT_FOLLOWLOCATION => FALSE,
    CURLOPT_AUTOREFERER => TRUE,
    CURLOPT_USERAGENT => "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.12) Gecko/20101026 Firefox/3.6.12",
    CURLOPT_HEADER => 0
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

function match_keywords(/*array &*/$search, /*array &*/$keys) {   // A function to replace the foreach keyword search
  $data = NULL;
  foreach ($keys as $key) {           // Will likely need to include a lot more variables for this to work
    if (stripos($search, $key) !== false) {
      $data = /*'<pre><a href="http://' . $city . '.' . $domain . $href . '"">' . */$search;/* . '</a>' . "</pre>";*/
    }
  }
return $data;
}

function explodey() {

}

$runscrape = 0;

if ($runscrape == 1) {
  foreach ($cat_craigslist_city as $city) {
    
    foreach ($cat_craigslist_jobs as $cat) {
      // List the city and category everytime we switch cities:
      echo "<pre>" . $city . ' / ' . $cat . "</pre>";

      // Define the URL to scrape
      $url = 'http://' . $city . '.' . $domain . '/search/' . $cat;
      // Actually start scraping using the PHP cURL library
      $response_page = crawley($url);

      $response_title = explode('class="icon icon-star"', $response_page);
      foreach ($response_title as $title) {

        $href = scrape_between($title, 'a href="', '"'); //need to be before title
        $title = scrape_between($title, '<span id="titletextonly">', '</span>');

        // Filter between local and surrounding area matches so that links are formatted correctly:
        if (substr($href, 0, 2) === "//") {
          //echo '<pre>Surrounding area match: <a href="http:' . $href . '" target="_blank">' . ltrim($href, "//") . '</a><pre>';
        } else {
          echo '<pre><a href="http://' . $city . '.' . $domain . $href . '" target="_blank">' . match_keywords($title, $keywords) . '</a></pre>';
        }
      }
    }     
  }
} else {
  
}


?>