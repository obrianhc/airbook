<?php

class Categoria{
	var $id;
	var $nombre;
	var $descripcion;
	public function Categoria(){
		$this->id = null;
		$this->nombre = null;
		$this->descripcion = null;
	}
	public function setCategoria($nombre, $descripcion){
		$this->nombre = $nombre;
		$this->descripcion = $descripcion;
	}
	public function getById($id){
		require_once('dbm.php');
		$data = new DataBase();
		$data->open();
		$query = "SELECT * FROM categoria WHERE id_categoria = $id";
		$result = mysqli_query($data->get_connect(), $query);
		$row = mysqli_fetch_array($result);
		$data->close();
		$this->id = $row[0];
		$this->nombre = $row[1];
		$this->descripcion = $row[2];
		return $this;
	}
	public function getByName($nombre){
		require_once('dbm.php');
		$data = new DataBase();
		$data->open();
		$query = "SELECT * FROM categoria WHERE nombre = '$nombre'";
		$result = mysqli_query($data->get_connect(), $query);
		$row = mysqli_fetch_array($result);
		$data->close();
		$this->id = $row[0];
		$this->nombre = $row[1];
		$this->descripcion = $row[2];
	}
	public function Create(){
		require_once('dbm.php');
		$data = new DataBase();
		$data->open();
		$query = "INSERT INTO categoria (nombre, descripcion) 
					VALUES ('$this->nombre', '$this->descripcion')";
		$result = mysqli_query($data->get_connect(), $query);
		$data->close();
		return $result;
	}
	public function Modify($nombre, $descripcion){
		require_once('dbm.php');
		$data = new DataBase();
		$data->open();
		$query = "UPDATE categoria SET nombre = '$nombre', descripcion = '$descripcion'
					WHERE id_categoria = $this->id";
		$result = mysqli_query($data->get_connect(), $query);
		$data->close();
		if($result){
			$this->nombre = $nombre;
			$this->descripcion = $descripcion;
			return true;
		} else {
			return false;
		}
	}
	public function Delete(){
		require_once('dbm.php');
		$data = new DataBase();
		$data->open();
		$query = "DELETE FROM categoria WHERE id_categoria = $this->id";
		$result = mysqli_query($data->get_connect(), $query);
		$data->close();
		if($result){
			$this->id = null;
			$this->nombre = null;
			$this->descripcion = null;
			return true;
		} else {
			return false;
		}
	}
}

?>