<?php
	require_once('airbook_file.php');
	basename($_FILES["fileToUpload"]["name"]);
	$archivo = new airbook_file();
	$status = $archivo->upload(3, basename($_FILES["fileToUpload"]["name"]),
	 pathinfo(basename($_FILES["fileToUpload"]["name"]),PATHINFO_EXTENSION), isset($_POST["submit"]),
			$_FILES["fileToUpload"]["tmp_name"], $_POST["title"], $_POST["description"]);
	if($status){
		echo 'El fichero ' . $_FILES["fileToUpload"]["name"] . ' se ha subido con exito.';
	} else {
		echo 'Error al subir el fichero.';
	}
?>