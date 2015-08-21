<?php
	$server="localhost"; 
	$user="root"; 
	$pass=""; 
	$db="airbook"; 
	$connect = mysqli_connect($server,$user,$pass) or die ('Error conectando con el servidor: '.mysqli_error()); 
	mysqli_select_db($connect,$db) or die ('Error seleccionando la DB: '.mysqli_error()); 
?>