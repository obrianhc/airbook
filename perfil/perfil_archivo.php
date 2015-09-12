<!DOCTYPE html>
<html>
<head>
	<title>Archivo</title>
</head>
<body>
	<?php 
		require_once('Logica_perfil_archivo.php');
		$lpa = new Logica_perfil_archivo;
	?>
	<form method="POST" enctype="multipart/form-data">
		<h3>Archivo</h3>
		<table>
			<tr>
				<td>Id del usuario logueado: </td>
				<td><input type="text" name="txt_id_usuario" size="15"></td>
			</tr>
			<tr>
				<td>Id del archivo: </td>
				<td><input type="text" name="txt_id_archivo" size="15"></td>
			</tr>
			<tr>
				<td>Comentario: </td>
				<td><textarea name="txt_comentario" rows = "4" columns = "50"></textarea></td>
			</tr>
			<tr>
				<td colspan = "2"><input type="submit" value = "Insertar Comentario" name="btn_insertar_comentario"/></td>
			</tr>
		</table>
		<?php 
		if(isset($_POST['btn_insertar_comentario'])){
			if($lpa->set_comentar($_POST['txt_id_archivo'], $_POST['txt_id_usuario'], $_POST['txt_comentario'])){
				echo "<script type=\"text/javascript\">alert('Insersion exitosa');</script>"; 
			}else{
				echo "<script type=\"text/javascript\">alert('Insersion erronea');</script>"; 
			}
		}
		?>
	</form>
</body>
</html>