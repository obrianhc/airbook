<?php
	include('dbm.php');
	class Llamar_solicitud
	{
		function get_categorias(){
			$datab = new DataBase();
			$datab->open();
			$query = "SELECT id_categoria, nombre FROM categoria";
			$result = mysqli_query($datab->get_connect(), $query);

			$lista = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new Categoria($row[0], $row[1]);
				$lista[] = $elemento;
			}
			mysqli_close($datab->get_connect());
			return $lista;
		}

		function get_solicitudes_todas(){
			$datab = new DataBase();
			$datab->open();
			$query = "SELECT solicitud.id_solicitud, usuario.nombre as nom_usuario, solicitud.comentario as comentario, solicitud.fecha as fecha 
					  FROM usuario, solicitud 
					  WHERE usuario.id_usuario = solicitud.id_usuario
					  ORDER BY solicitud.fecha DESC";
			$result = mysqli_query($datab->get_connect(), $query);
			$lista = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new Solicitud($row[0], $row[1], $row[2], $row[3]);
				$lista[] = $elemento;
			}
			mysqli_close($connect);
			return $lista;

		}

		function get_solicitudes_todas_filtrada($categorias){
			$datab = new DataBase();
			$datab->open();
			$connect = $datab->get_connect();
			$str_filtro = "";
			$lista_con_comas = "";

			if(count($categorias)>0){
		
				$str_filtro = ' AND solicitud_categoria.id_categoria IN ('.implode(', ', $categorias).') ';
			}


			$query = "SELECT DISTINCT 
					   solicitud.id_solicitud, 
					   usuario.nombre as nom_usuario, 
				       solicitud.comentario as comentario, 
				       solicitud.fecha as fecha 
				       FROM solicitud, usuario, solicitud_categoria
				       WHERE usuario.id_usuario = solicitud.id_usuario
				       AND solicitud_categoria.id_solicitud = solicitud.id_solicitud $str_filtro ORDER BY solicitud.fecha DESC";
			$result = mysqli_query($connect, $query);

			$lista = array();
			while($row = mysqli_fetch_array($result)){
				$elemento = new Solicitud($row[0], $row[1], $row[2], $row[3]);
				$lista[] = $elemento;
			}
			mysqli_close($connect);
			return $lista;
		}

		function set_solicitud($id_usuario, $comentario, $categorias){
			$ret = false;
			if($comentario == "" OR count($categorias) == 0)
				return false;

			$datab = new DataBase();
			$datab->open();
			$connect = $datab->get_connect();
			if (mysqli_connect_errno())
				return false;

			mysqli_autocommit($connect,FALSE);
			$query = "INSERT INTO solicitud(id_usuario, comentario, fecha) VALUES ($id_usuario, '$comentario', NOW())";
			mysqli_query($connect, $query);
			$id_solicitud = mysqli_insert_id($connect);

			foreach ($categorias as $categoria) {
				$query = "INSERT INTO solicitud_categoria(id_solicitud, id_categoria) VALUES ($id_solicitud, $categoria)";
				mysqli_query($connect, $query);
			}

			if(mysqli_commit($connect)){
				$ret = true;
			}
			mysqli_close($connect);
			return $ret;
		}
	}

	class Solicitud{
		var $id;
		var $nom_usuario;
		var $comentario;
		var $fecha;

		public function __construct($id, $nom_usuario, $comentario, $fecha){
			$this->id = $id;
			$this->nom_usuario = $nom_usuario;
			$this->comentario = $comentario;
			$this->fecha = $fecha;
		}

		function getId(){
			return $this->id;
		}

		function getNomUsuario(){
			return $this->nom_usuario;
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