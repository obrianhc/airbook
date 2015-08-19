<?php
class airbook_file{
		function upload($userid, $filename, $filetype, $isset, $tempname){
			// Datos pertinentes al archivo para subir
			echo '- ' . $userid . '<br>- ' . $filename . '<br>- ' . $filetype . '<br>- ' . $isset . '<br>- ' . $tempname . '<br>';
			$target_dir = "uploads/";
			$datetime = time();
			$md5_filename = md5($filename);
			$target_file = $target_dir . time();
			// Colocamos la extension adecuada al archivo para subir
			if($filetype == "rar"){
				$target_file .= ".rar";
			} else if($filetype == "zip"){
				$target_file .= ".zip";
			} else {
				return false;
			}
			// Verificamos que realmente subiremos un archivo
			if(!$isset){
				return false;
			}
			// Ahora subiremos el archivo
			if (move_uploaded_file($tempname, $target_file)) {
		        echo "The file ". $filename . " has been uploaded.";
		    } else {
		        echo "Sorry, there was an error uploading your file.";
		    }
		    return true;
		}
	}
?>