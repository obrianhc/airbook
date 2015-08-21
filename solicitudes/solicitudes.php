<!DOCTYPE html>
<html>
<head>
	<title>Solicitudes de Contenido a Subir</title>
</head>
<body>
	<?php 
		require_once('Llamar_Solicitud.php');
		$solicitud = new Llamar_Solicitud();
	?>
	<h2>Solicitudes</h2>
	<h3>¿Qué es lo que buscas?</h3>
	<form method="POST" enctype="multipart/form-data">
		<input type="text" name="txt_categoria" size="15">
		<select name="opt_categorias">
			<option value = 0>--Categorias--</option>
			<?php 
				$lis_cat = $solicitud->get_categorias();
				$x = 0;
				while($x < count($lis_cat)) { 
					echo "<option value = ".$lis_cat[$x]->getId().">";
					echo $lis_cat[$x]->getNombre();
					echo "</option>"; 
					$x++;
				} 
			?>
		</select>
		<input type="submit" value = "Filtrar por categoria" name="btn_por_categoria"/>
		<table id="tbl_solicitudes">
			<thead>
				<th>Usuario</th>
				<th>Categoria</th>
				<th>Comentario</th>
				<th>Fecha</th>
			</thead>
			<tbody>
					<?php 
					if(isset($_POST['btn_por_categoria'])){
						$sel_id_categoria = $_POST['opt_categorias']; 
						$lis_sol = $solicitud->get_solicitudes_todas_filtrada($sel_id_categoria);
						
					}else{
						$lis_sol = $solicitud->get_solicitudes_todas();	
					}
					$x = 0;
					while($x < count($lis_sol)) {
						echo "<tr>";
						echo "<td>".$lis_sol[$x]->getNomUsuario()."</td>"; 
						echo "<td>".$lis_sol[$x]->getNomCategoria()."</td>"; 
						echo "<td>".$lis_sol[$x]->getComentario()."</td>"; 
						echo "<td>".$lis_sol[$x]->getFecha()."</td>"; 
						echo "</tr>";
						$x++;
					}
						
					?>
			</tbody>
		</table>
	</form>
</body>
</html>