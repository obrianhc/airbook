<!DOCTYPE html>
<html>
<head>
	<title>Solicitudes de Contenido a Subir</title>
</head>
<body>
	<?php 
		require_once('Llamar_Solicitud.php');
		$solicitud = new Llamar_Solicitud();
		$lblRestpuesta = "...........................................";
	?>
	<h2>Solicitudes</h2>
	<form method="POST" enctype="multipart/form-data">
		<h3>¿Necesitas Algo, Dinoslo?</h3>
		<table>
			<tr>
				<td>Comentario: </td>
				<td><textarea name="txt_comentario" rows = "4" columns = "50"></textarea></td>
			</tr>
			<tr>
				<td>Categoria: </td>
				<td>
					<select name="opt_categorias_insert">
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
				</td>
			</tr>
			<tr>
				<td colspan = "2"><input type="submit" value = "Insertar Solicitud" name="btn_insertar_solicitud"/></td>
			</tr>
		</table>
		<h3>¿Qué es lo que buscas?</h3>
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
		<input type="submit" value = "Filtrar por categoria" name="btn_filtrar_por_categoria"/>
		<table id="tbl_solicitudes">
			<thead>
				<th>Usuario</th>
				<th>Categoria</th>
				<th>Comentario</th>
				<th>Fecha</th>
			</thead>
			<tbody>
					<?php 
					if(isset($_POST['btn_filtrar_por_categoria'])){
						$sel_id_categoria = $_POST['opt_categorias']; 
						$lis_sol = $solicitud->get_solicitudes_todas_filtrada($sel_id_categoria);
			
					}elseif(isset($_POST['btn_insertar_solicitud'])){
						$boolRestpuesta =  $solicitud->set_solicitud(1, htmlspecialchars($_POST['txt_comentario']), $_POST['opt_categorias_insert']); 
						$lis_sol = $solicitud->get_solicitudes_todas();	
						if($boolRestpuesta)
							$lblRestpuesta = "Insersión Exitosa";
						else
							$lblRestpuesta = "Insersión fallida, llene bien los campos";
						echo "<script type=\"text/javascript\">alert(\"" . $lblRestpuesta . "\");</script>";  
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