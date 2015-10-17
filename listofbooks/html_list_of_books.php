<html>
	<head>
		<title>
			Listado de archivos subidos
		</title>
	</head>
	<style>
		table td{
			border:1px solid #000;
		}
	</style>
	<body>
		<?php
			require_once('user.php');
			$usuario = new user(3);
			$lista = $usuario->list_of_files();
			$elemento = new element_book(0,0,"","");
			$x = 0;
			echo '<table>';
			while($x < count($lista)){
				$elemento = $lista[$x];
				echo '<tr><td><a href="book_profile.php?id=' . $elemento->getId() . '">' 
					. $elemento->getTitle() . '</a></td><td><a href="book_profile.php?id=' 
					. $elemento->getId() . '">' . $elemento->getDescription() . '</a></td></tr>';
				$x++;
			}
			echo '</table>';
		?>
	</body>
</html>