<?php
	class DataBase{
		private $server;
		private $user;
		private $password;
		private $db;
		private $connect;

		function open(){
			$this->server="localhost";
			$this->user="root";
			$this->password="";
			$this->db="airbook";
			$this->connect = mysqli_connect($this->server,$this->user,$this->password) or die ('Error conectando con el servidor: '.mysqli_error()); 
			return mysqli_select_db($this->connect,$this->db) or die ('Error seleccionando la DB: '.mysqli_error($this->connect));
		}

		function close(){
			return mysqli_connect($this->connect);
		}

		function get_connect(){
			return $this->connect;
		}
	}
?>