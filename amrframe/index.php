<?php
session_start();
ob_start();
require_once('config.php');

require_once('frame/controllers/index.php');
echo "a";
require_once('frame/url/url.php');


class father{

public function __construct(){


}

public function index($page){



}

public function config($element){
	include('config.php');
	global $config;
	return $config[$element];
}


public function query_string($num){
	global $query;
	require_once('frame/url/url.php');
	return $query[$num];
}

}




$a = new father();









?>