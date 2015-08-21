<?php
class airbook_file{
		function upload($userid, $filename, $filetype, $isset, $tempname, $title, $description){
			// Datos pertinentes al archivo para subir			
			$target_dir = "uploads/";
			$datetime = time();
			$md5_filename = md5($filename);
			$target_file = $target_dir . $md5_filename . time();
			// Colocamos la extension adecuada al archivo para subir
			if($filetype == "rar"){
				$target_file = $target_file . ".rar";
			} else if($filetype == "zip"){
				$target_file = $target_file . ".zip";
			} else if($filetype == "pdf"){
				$target_file = $target_file . ".pdf";
			}else {
				return false;
			}
			// Verificamos que realmente subiremos un archivo
			if(!$isset){
				return false;
			}
			// Ahora subiremos el archivo
			if (move_uploaded_file($tempname, $target_file)) {
				$status = $this->insert_file($userid, $title, $target_file, $description);
				if($status)
		        	return true;
		        else
		        	return false;
		    } else {
		    	return false;
		    }
		}

		function insert_file($userid, $title, $path, $description){
			require_once('db.php');
			$query = "INSERT INTO archivo (id_user, title, description, filepath) 
						VALUES ($userid, '$title', '$description', '$path');";
			$result = mysql_query($connect, $query) or die ('Error insertando registro: ' . mysql_error());
			mysql_close($connect);
			if($result)
				return true;
			else
				return false;
		}
	}
?>