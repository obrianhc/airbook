<?php
	class user{
		var $userid;
		var $username;
		var $files;

		function user($userid){
			$this->userid = $userid;
		}

		function list_of_files(){
			// Esta funcion devolvera un arreglo de objetos para los archivos
			require_once('dbm.php');
			$data = new DataBase();
			$userid = $this->userid;
			$query = "SELECT * FROM archivo WHERE id_usuario = $userid";
			$data->open();
			$result = mysqli_query($data->get_connect(),$query);
			$list_of_files = array();
			while($row = mysqli_fetch_array($result)) {
				$elemento = new element_book($row[1], $row[2], $row[3], $row[4]);
				$elemento->setId($row[0]);
				$list_of_files[] = $elemento;
			}
			$data->close();
			return $list_of_files;
		}
	}

	class element_book{
		var $id;
		var $user;
		var $title;
		var $path;
		var $description;
		function element_book($user, $title, $description, $path){
			$this->user = $user;
			$this->title = $title;
			$this->path = $path;
			$this->description = $description;
		}
		function setId($id){
			$this->id = $id;
		}
		function getId(){
			return $this->id;
		}
		function getUserId(){
			return $this->user;
		}
		function getTitle(){
			return $this->title;
		}
		function getPath(){
			return $this->path;
		}
		function getDescription(){
			return $this->description;
		}
	}
?>