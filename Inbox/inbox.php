<?php
	class Inbox{
	
		//funcion que recibe el id del destinatario(usuario actual que quiere revisar sus mensajes) y devuelve la lista de mensajes 
		//con sus respectivos remitentes
		function getMessage($id_destinatario){
			require_once('dbm.php');
			$data = new DataBase();
			$data->open();
			$query = "SELECT mensaje, id_remitente FROM inbox WHERE id_destinatario = $id_destinatario";
			$result = mysqli_query($data->get_connect(), $query);
			$data->close();
			$data_message = array();
			while($row = mysqli_fetch_array($result)){
				$data_message[] = $row;
			}
			return $data_message;
		}

		//funcion que recibe el id del remitente, el mensaje a enviar y el id del destinatario para insertarlo en la tabla inbox,
		//devuelve true o false dependiendo si se pudo realizar la insercion o no.
		function setMessage($id_remitente, $mensaje, $id_destinatario){
			require_once('dbm.php');
			$data = new DataBase();
			$data->open();
			$query = "INSERT INTO inbox VALUES($id_remitente,$mensaje, $id_destinatario)";
			if(mysqli_query($data->get_connect(), $query)){
				$data->close();
				return TRUE;
			}else{
				return FALSE;
		}


	}
?>