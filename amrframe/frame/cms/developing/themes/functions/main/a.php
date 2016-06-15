<?php


class main extends a_controller{

	public function __construct(){

		
		
	}

	
public function add_db(){
	
	$conn =  $this->db();
	 //Change Your Database Name

$filename = 'http://localhost/amrframe/frame/cms/developing/themes/db/users.sql'; //How to Create SQL File Step : url:http://localhost/phpmyadmin->detabase select->table select->Export(In Upper Toolbar)->Go:DOWNLOAD .SQL FILE
$op_data = '';
$lines = file($filename);
foreach ($lines as $line)
{
    if (substr($line, 0, 2) == '--' || $line == '')//This IF Remove Comment Inside SQL FILE
    {
        continue;
    }
    $op_data .= $line;
    if (substr(trim($line), -1, 1) == ';')//Breack Line Upto ';' NEW QUERY
    {
        $conn->query($op_data);
        $op_data = '';
    }
}

}




public function check_db(){
$conn =  $this->db();
$table = "users";
$result = $conn->query("SHOW TABLES LIKE '$table'");
if($result->num_rows ==1) 
    return 1;
else 
	return 0;

}

public function add_user($name,$email,$password,$admin){
	$con = $this->db();
	$name = $this->db_filter($name);
	$email = $this->db_filter($email);
	$password = $this->db_filter($password);
	$password_cry = sha1($password); 
	$result = $con->query("select * from users where email = '$email'");
	if($result->num_rows >= 1){
		return 0;
	}
	else{
	$con->query("insert into users(name,email,password,admin) values('$name','$email','$password_cry','$admin')");
	return 1;
	}	
}

//checking instaltion ---------------->
public function install($statue){
	$install = $this->config('installed');
	$db = $this->check_db();

	if($install != 1 || $db != 1){
		if($statue == "check"){
			return 0;
		}
		else{
		$this->add_db();
		$main_url = $this->main_url();
		$config = $main_url."/config.php";
		$config_cont = file_get_contents($config);
		$new_cont = str_replace("$installed =0;", "$installed =1;", $config_cont);
		
		@file_put_contents($config,$new_cont);
		header("Refresh:0");
		}

	}
}



}
$m = new main();


?>