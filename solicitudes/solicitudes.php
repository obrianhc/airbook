<!DOCTYPE html>
<html>
<head>
	<title>Solicitudes de Contenido a Subir</title>
</head>
<body>
	<h2>Solicitudes</h2>
	<h3>¿Qué es lo que buscas?</h3>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="txt_categoria" size="15">
		<input type="submit" value = "Filtrar por categoria" name="btn_por_categoria"/>
		<table id="tbl_solicitudes">
			<?php 
				require_once('Llamar_Solicitud.php');
				$solicitud = new Llamar_Solicitud();
			?>
			<thead>
				<th>Usuario</th>
				<th>Categoria</th>
				<th>Comentario</th>
				<th>Fecha</th>
			</thead>
			<tbody>
					<?php 
						require_once('Llamar_Solicitud.php');
						if(isset($_POST['btn_por_categoria'])){
							$valor_categoria = $_POST['txt_categoria'];
							if($valor_categoria == ''){
								$resultado = $solicitud->get_all_solicitud();
							}else{
								$resultado = $solicitud->get_filtro_solicitud($valor_categoria);
							}
						}else {
							$resultado = $solicitud->get_all_solicitud();
						}

						while($col = mysqli_fetch_array($resultado)) { 
							echo "<tr>";
							echo "<td>" . $col["nom_usuario"] . "</td>"; 
							echo "<td>" . $col["nom_categoria"] . "</td>"; 
							echo "<td>" . $col["comentario"] . "</td>"; 
							echo "<td>" . $col["fecha"] . "</td>"; 
							echo "</tr>";
						} 
					?>	
			</tbody>
		</table>
	</form>
</body>
</html>