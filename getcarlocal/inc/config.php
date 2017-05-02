<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// require 'core/init.php'; A useless autoinclude file, currently missing

require_once 'useragentlist.php';

$cities = array(
  "albuquerque",    //new mexico
  "bend",
  "boise",         //idaho
  "boulder",       //colorado
  "butte",         //utah
  "dallas",        //dallas
  "denver",        //colorado
  "eastoregon",
  "eugene",
  //"lasvegas",
  "portland",
  "saltlakecity",  //utah
  "seattle",
  "salem"
  );

$domain = "craigslist.org";

$keywords = array(
  "240",
  "crate",
  "datsun",
  "focus",
  "kit",
  "saab",
  "subaru",
  "supra",
  "t100",
  "toyota",
  "volks",
  "volvo",
  "wrx"
);