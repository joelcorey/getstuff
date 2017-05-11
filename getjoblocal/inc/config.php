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

$domains = array(
	"https://portland.craigslist.org/search/grg/egr",
	"https://portland.craigslist.org/search/grg/med",
	"https://portland.craigslist.org/search/grg/web",
	"https://portland.craigslist.org/search/grg/eng",
	"https://portland.craigslist.org/search/grg/mar",
	"https://portland.craigslist.org/search/grg/npo",
	"https://portland.craigslist.org/search/grg/cpg",
	"https://portland.craigslist.org/search/grg/crg"
	);

$keywords = array(
  "angular",
  "associate",
  "entry",
  "front",
  "gis",
  "javascript",
  "lemp",
  "linux",
  "nginx",
  "php",
  "polymer",
  "pwa", // progressive web app
  "react",
  "remote",
  "telecommute",
  "vue",
  "web"
);
