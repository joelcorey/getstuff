<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// require 'core/init.php'; A useless autoinclude file, currently missing

require_once 'useragentlist.php';

$categories = array(
  //"acc",  // accounting
  //"bus",  // business / management
  //"etc",  // et cetera
  "cpg",  // gigs - computer
  "crg",  // gigs - creative
  "med",  // art / media / design
  //"npo",  // non profit
  //"rej",  // real estate
  //"sad",  // sys admin and network
  //"tch",  // tech support
  //"sls",  // sales
  //"sof",  // software
  "web" // web / info design
  //"wri" // writing editing and translation
  );

$domain = "https://portland.craigslist.org";

$keywords = array(
  "angular",
  "front",
  "gis",
  "javascript",
  "lemp",
  "linux",
  "nginx",
  "php",
  "web"
);
