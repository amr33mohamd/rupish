<?php
class db{
	function conn(){
		$conn=mysqli_connect("localhost","root","","arab_code");
		mysqli_query($conn,"SET NAMES 'utf8'");
		return $conn;
		}
	}
	
?>