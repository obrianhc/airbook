<?php
	$server="localhost"; 
	$user="root"; 
	$pass=""; 
	$db="airbook"; 
	$connect = mysql_connect($server,$user,$pass) or die ('Error conectando con el servidor: '.mysql_error()); 
	mysql_select_db($db,$connect); 
?>