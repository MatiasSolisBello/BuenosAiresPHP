<?php
	$mysqli=new mysqli(
	$dbhost	= "localhost",   // localhost or IP
	$dbuser	= "root",	  // database username
	$dbpass	= "",     // database password
	$dbname	= "buenos_aires2.0"
	);
	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>

