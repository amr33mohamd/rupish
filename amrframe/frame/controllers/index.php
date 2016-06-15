<?php

class a_controller extends father{

public function __construct(){
	parent::__construct();
	
	global $main_folder;
	
	global $theme;
	//geting full url ---->
	$full_url = $_SERVER['REQUEST_URI'];


	//geting things after main folder ------>
	$query_page = str_replace("/$main_folder/","", $full_url);



	//devide into array :D ----------->
	$query = explode("/",$query_page);


	//geting selected page----->
	
	$file = $query[0];
	

	$dir_sub_function = "developing/$theme/functions/sub/$file";
	$sub_function_files = @scandir($dir_sub_function);

	//helping error ------>
	if(!$sub_function_files && $helping_errors == 1){
		echo "<br> -no sub_function files";
	}

	$num_sub_function = count($sub_function_files) - 1 ;
	while ($num_sub_function > 1) {
		require_once("developing/$theme/functions/sub/$file/$sub_function_files[$num_sub_function]");
		$num_sub_function --;
		
		
	}



	

	//main functions



	$dir_main_function = "developing/$theme/functions/main";
	$main_function_files = @scandir($dir_main_function);

	//helping error ------>
	if(!$main_function_files && $helping_errors == 1){
		echo "<br> -no main_function files";
	}

	$num_main_function = count($main_function_files) - 1 ;
	while ($num_main_function > 1) {
		require_once("developing/$theme/functions/main/$main_function_files[$num_main_function]");
		$num_main_function --;
		
		
	}
	

}




//db connecting ---->
	
public function db(){
		$theme = $this->config('theme');
		require_once("developing/$theme/db/database.php");
		global $conn;
		$use =new db;
		$conn =$use->conn();
		return $conn;
		}


	// --------- data base filtering to close sql injection //
	public function db_filter($var){
		$conn =$this->db();
		return htmlspecialchars(mysqli_real_escape_string($conn,trim($var,"'")));
	}

	// --------- inputs or query strings closed xss ------------------//

	public function filter($var){
		return htmlspecialchars(trim($var,"'"));
	}


//geting part function ----->

public function part($part){
	$theme = $this->config('theme');

	
	$exist = file_exists("design/$theme/parts/$part".".php");
	if($exist){
		if($static == 0){
		require_once("design/$theme/parts/".$part.".php");
		}
		else{
		require_once("design/$theme/parts/".$part.".html");		
		}

	}
	else{
		echo "file not exist";
	}
}


public function page($page){
	$theme = $this->config('theme');
	$static = $this->config('static');
	
	$exist = file_exists("design/$theme/pages/$page".".php");
	if($exist){
		if($static == 0){
		require_once("design/$theme/pages/".$page.".php");
		}
		else{
		require_once("design/$theme/pages/".$page.".html");
		}		
	}
	else{
		echo "page is not exist";
	}
}







}



$mq = new a_controller();


?>