<?php
	include('dbm.php');
	class Logica_perfil_archivo
	{
		function set_comentar($id_archivo, $id_usuario, $texto){
			$ret = false;
			if($texto == "" OR $id_usuario == "" OR $id_archivo == "")
				return false;

			$datab = new DataBase();
			$datab->open();
			$connect = $datab->get_connect();
			if (mysqli_connect_errno())
				return false;

			mysqli_autocommit($connect,FALSE);
			$query = "INSERT INTO comentario(id_archivo, id_usuario, fecha, texto) VALUES ($id_archivo, $id_usuario, NOW(), '$texto');";
			if(mysqli_query($connect, $query)==false)
				return false;

			if(mysqli_commit($connect)){
				$ret = true;
			}
			mysqli_close($connect);
			return $ret;
		}
	}
?>