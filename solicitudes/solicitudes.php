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
				<td>Categorias: </td>
				<td>
					<?php 
						$lis_cat = $solicitud->get_categorias();
						$x = 0;
						while($x < count($lis_cat)) { 
							echo "<input type='checkbox' name='categorias_insert[]' value = ".$lis_cat[$x]->getId()."/>";
							echo $lis_cat[$x]->getNombre();
							$x++;
						} 
					?>
				</td>
			</tr>
			<tr>
				<td colspan = "2"><input type="submit" value = "Insertar Solicitud" name="btn_insertar_solicitud"/></td>
			</tr>
		</table>
		<h3>¿Qué es lo que buscas?</h3>


		<table>
			<tr>
				<td>Categorias: </td>
				<td>
					<?php 
						$lis_cat_f = $solicitud->get_categorias();
						$x = 0;
						while($x < count($lis_cat_f)) { 
							echo "<input type='checkbox' name='categorias_filtrar[]' value = ".$lis_cat_f[$x]->getId()."/>";
							echo $lis_cat_f[$x]->getNombre();
							$x++;
						} 
					?>
				</td>
			</tr>
			<tr>
				<td><input type="submit" value = "Filtrar" name="btn_filtrar_por_categoria"/></td>
			</tr>
		</table>


		<table id="tbl_solicitudes">
			<thead>
				<th>Usuario</th>
				<th>Comentario</th>
				<th>Fecha</th>
			</thead>
			<tbody>
					<?php
					$lis_sol = array();
					$categorias = array();

					if(isset($_POST['btn_insertar_solicitud'])){
						$hay_categorias = isset($_POST['categorias_insert']);
						if($hay_categorias){
							$categ_insert = $_POST['categorias_insert'];
						    for($i=0; $i < count($categ_insert); $i++)
						      $categ_insert[$i] = str_replace('/', '', $categ_insert[$i]);

						  	if($solicitud->set_solicitud(1, htmlspecialchars($_POST['txt_comentario']), $categ_insert)){
						  		echo "<script type=\"text/javascript\">alert('La solicitud fue insertada con exito');</script>"; 
						  	}else{
						  		echo "<script type=\"text/javascript\">alert('Problemas de insersión de la solicitud');</script>";
						  	}
							
						}else{
							echo "<script type=\"text/javascript\">alert('Necesita al una categoria para la insersión');</script>"; 
						}
					}
					elseif(isset($_POST['btn_filtrar_por_categoria'])){
						$hay_categorias_a_filtrar = isset($_POST['categorias_filtrar']);
						if($hay_categorias_a_filtrar){
							$categ_filtrar = $_POST['categorias_filtrar'];
							for($i=0; $i < count($categ_filtrar); $i++){
								$categ_filtrar[$i] = str_replace('/', '', $categ_filtrar[$i]);
							}
							$categorias = $categ_filtrar;
						}
						
					}

					$lis_sol = $solicitud->get_solicitudes_todas_filtrada($categorias);	

					$x = 0;
					while($x < count($lis_sol)) {
						echo "<tr>";
						echo "<td>".$lis_sol[$x]->getNomUsuario()."</td>"; 
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