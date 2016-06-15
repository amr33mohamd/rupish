<?php
class db extends father{
	function conn(){
		$conn= new mysqli("localhost","root","","amrframe");
		mysqli_query($conn,"SET NAMES 'utf8'");
		return $conn;
		}
	}
	
?>