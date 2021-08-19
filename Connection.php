<?php

	$conn = mysqli_connect('localhost','root','','tsf_bank');

	if(!$conn){
		die("Error in establishing Connection :( ".mysqli_connect_error());
	}

?>