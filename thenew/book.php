<?php
	class book{
		function new_entries_by_category($category){
			require_once('db.php');
			$query = "SELECT `id_file`, `title`, `description`, `filepath`
						FROM `archivo` WHERE `id_user` = $category ORDER BY 1 DESC LIMIT 20";
			$result = mysqli_query($connect, $query);
			$list_of_files = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new element_book($row[0], $row[1], $row[2], $row[3]);
				$elemento->setId($row[0]);
				$list_of_files[] = $elemento;
			}
			mysqli_close($connect);
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