<?php
	class user{
		var $userid;
		var $username;

		function user($userid){
			$this->$userid = $userid;
		}

		function list_of_files(){
			// Esta funcion devolvera un arreglo de objetos para los archivos
			require_once('db.php');
			$userid = $this->$userid;
			$query = "SELECT * FROM archivo WHERE id_user = $userid";
			$result = mysqli_query($query, $connect);
			$list_of_files = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new element_book();
				$elemento->setId($row[0]);
				$elemento->$element_book($row[1], $row[2], $row[3], $row[4]);
				$list_of_files[] = $elemento;
			}
			mysqli_close();
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
			$this->$user = $user;
			$this->$title = $title;
			$this->$path = $path;
			$this->$description = $description;
		}
		function setId($id){
			$this->$id = $id;
		}
		function getId(){
			return $this->$id;
		}
		function getUserId(){
			return $this->$user;
		}
		function getTitle(){
			return $this->$title;
		}
		function getPath(){
			return $this->$path;
		}
		function getDescription(){
			return $this->$description;
		}
	}
?>