<?php
class airbook_file{
		function upload($userid, $filename, $filetype, $isset, $tempname){
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
			} else {
				return false;
			}
			// Verificamos que realmente subiremos un archivo
			if(!$isset){
				return false;
			}
			// Ahora subiremos el archivo
			if (move_uploaded_file($tempname, $target_file)) {
		        return true;
		    } else {
		        return false;
		    }
		}
	}
?>