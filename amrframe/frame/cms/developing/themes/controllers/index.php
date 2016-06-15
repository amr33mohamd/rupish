<?php

class amr extends a_controller{

public function __construct(){
	parent::__construct();
	$main = new main;
	$this->page('index');
	$main->add_user('k','k','l','0');
}

}

$qm = new amr();


?>