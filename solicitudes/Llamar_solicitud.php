<?php
	/**
	* 
	*/
	class Llamar_solicitud
	{
		function get_categorias(){
			require("db.php");
			$query = "SELECT * FROM categoria";
			$result = mysqli_query($connect, $query);
			$lista = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new Categoria($row[0], $row[1]);
				$lista[] = $elemento;
			}
			mysqli_close($connect);
			return $lista;
		}

		function get_solicitudes_todas(){
			require("db.php");
			$query = "SELECT solicitud.id_solicitud, usuario.nombre as nom_usuario, categoria.nombre as nom_categoria, solicitud.comentario as comentario, solicitud.fecha as fecha 
					  FROM usuario, categoria, solicitud 
					  WHERE usuario.id_usuario = solicitud.id_usuario AND categoria.id_categoria = solicitud.id_categoria
					  ORDER BY solicitud.fecha DESC";
			$result = mysqli_query($connect, $query);
			$lista = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new Solicitud($row[0], $row[1], $row[2], $row[3], $row[4]);
				$lista[] = $elemento;
			}
			mysqli_close($connect);
			return $lista;

		}

		function get_solicitudes_todas_filtrada($id_categoria){
			require("db.php");
			$str_filtro = "";
			if($id_categoria > 0)
				$str_filtro = $str_filtro . "AND solicitud.id_categoria = $id_categoria";
			$query = "SELECT solicitud.id_solicitud, usuario.nombre as nom_usuario, categoria.nombre as nom_categoria, solicitud.comentario as comentario, solicitud.fecha as fecha 
					  FROM usuario, categoria, solicitud 
					  WHERE usuario.id_usuario = solicitud.id_usuario AND categoria.id_categoria = solicitud.id_categoria $str_filtro
					  ORDER BY solicitud.fecha DESC";
			$result = mysqli_query($connect, $query);
			$lista = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new Solicitud($row[0], $row[1], $row[2], $row[3], $row[4]);
				$lista[] = $elemento;
			}
			mysqli_close($connect);
			return $lista;
		}

		function set_solicitud($id_usuario, $comentario, $id_categoria){
			if($comentario == "")
				return "El comentario no puede estar en blanco";
			if($id_categoria == 0)
				return "Escoga una categoria!!!";
			require("db.php");
			if (mysqli_connect_errno())
			{
				return "Error en la conexión: " . mysqli_connect_error();
			}
			$query = "INSERT INTO solicitud(id_usuario, comentario, id_categoria, fecha) VALUES ($id_usuario, '$comentario', $id_categoria, NOW())";
			mysqli_autocommit($connect,FALSE);
			mysqli_query($connect, $query);
			mysqli_commit($connect);
			mysqli_close($connect);
			return "Insersión Exitosa!!!!";

		}
	}

	class Solicitud{
		var $id;
		var $nom_usuario;
		var $nom_categoria;
		var $comentario;
		var $fecha;

		public function __construct($id, $nom_usuario, $nom_categoria, $comentario, $fecha){
			$this->id = $id;
			$this->nom_usuario = $nom_usuario;
			$this->nom_categoria = $nom_categoria;
			$this->comentario = $comentario;
			$this->fecha = $fecha;
		}

		function getId(){
			return $this->id;
		}

		function getNomUsuario(){
			return $this->nom_usuario;
		}

		function getNomCategoria(){
			return $this->nom_categoria;
		}
		function getComentario(){
			return $this->comentario;
		}
		function getFecha(){
			return $this->fecha;
		}
	}

	class Categoria{
		var $id;
		var $nombre;

		public function __construct($id, $nombre){
			$this->id = $id;
			$this->nombre = $nombre;
		}

		function setId($id){
			$this->id = $id;
		}
		function getId(){
			return $this->id;
		}
		function setNombre($nombre){
			$this->nombre = $nombre;
		}
		function getNombre(){
			return $this->nombre;
		}
	}
?>