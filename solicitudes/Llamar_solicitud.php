<?php
	/**
	* 
	*/
	class Llamar_solicitud
	{
		
		function get_all_solicitud()
		{
			require_once("db.php");
			$link = mysqli_connect($server, $user, $pass, $db) or die("Error " . mysqli_error($link)); 
			$query = "SELECT usuario.nombre as nom_usuario, categoria.nombre as nom_categoria, solicitud.comentario as comentario, solicitud.fecha as fecha 
					  FROM solicitud, categoria, usuario 
					  WHERE solicitud.id_usuario = usuario.id_usuario AND solicitud.id_categoria = categoria.id_categoria 
					  ORDER BY solicitud.fecha DESC" 
			or die("Error en la consulta.." . mysqli_error($link));
			$resultado = $link->query($query); 

			return $resultado;
		}

		function get_filtro_solicitud($categoria)
		{
			require_once("db.php");
			$link = mysqli_connect($server, $user, $pass, $db) or die("Error " . mysqli_error($link)); 
			$query = "SELECT usuario.nombre as nom_usuario, categoria.nombre as nom_categoria, solicitud.comentario as comentario, solicitud.fecha as fecha 
					  FROM solicitud, categoria, usuario 
					  WHERE solicitud.id_usuario = usuario.id_usuario AND solicitud.id_categoria = categoria.id_categoria AND categoria.nombre = '$categoria'
					  ORDER BY solicitud.fecha DESC" 
			or die("Error en la consulta.." . mysqli_error($link));
			$resultado = $link->query($query); 

			return $resultado;
		}
	}
?>