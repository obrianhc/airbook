<?php
	class DataBase{
		private var $server;
		private var $user;
		private var $password;
		private var $db;
		private var $connect;
		function open(){
			$this->server="localhost";
			$this->user="root";
			$this->password="";
			$this->db="airbook";
			mysqli_connect($this->server,$this->user,$this->pass) or die ('Error conectando con el servidor: '.mysqli_error()); 
			return mysqli_select_db($this->connect,$this->db) or die ('Error seleccionando la DB: '.mysqli_error()); 
		}

		function close(){
			return mysqli_connect($this->connect);
		}
	}
?>