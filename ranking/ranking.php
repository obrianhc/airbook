<?php
	class Ranking{
	
		//funcion que recibe el id del documento y devuelve un arreglo con el nombre y el punteo de este.
		function getBook($libro_id){
			require_once('dbm.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT nombre, punteo FROM archivo WHERE id_archivo = $libro_id";
			$result = mysqli_query($query, $connect);
			$data->close();
			$data_book = array();
			while($row = mysqli_fetch_array($result)){
				$data_book[] = $row;
			}
			return $data_book;
		}

		//funcion que recibe el id del usuario que explora la pagina, el id del archivo que se esta viendo y la calificacion deseada y se inserta en la tabla 
		//valoracion_archivo, devuelve true o false dependiendo si se pudo realizar la insercion o no.
		function rate($id_usuario, $id_archivo, $calificacion){
			require_once('dbm.php');
			if($calificacion >=1 && $calificacion >=5){
				$data = new DataBase();
				$data->open();
				$query = "INSERT INTO valoracion_archivo value($id_usuario,$id_archivo, $calificacion)";
				if(mysqli_query($query, $data->get_connect)){
					$data->close();
					return TRUE;
				}else{
					$query = "UPDATE valoracion_archivo SET puntos = $calificacion WHERE id_usuario = $id_usuario AND id_archivo = $id_archivo;";
					if(mysqli_query($query,	$data->get_connect)){
						$data->close();
					}else{
						$data->close();
						return FALSE;
					}	
				}
			}else{
				return FALSE;
			}	
		}


	}
?>