<html>
	<head>
		<title>
			Listado de archivos subidos
		</title>
	</head>

	<body>
		<?php
			require_once('user.php');
			$usuario = new user(3);
			$lista = $usuario->list_of_files();
			$elemento = new element_book(0,0,"","");
			$x = 0;
			while($x < count($lista)){
				$elemento = $lista[$x];
				echo $elemento->getTitle() .'<br>';
				$x++;
			}
		?>
	</body>
</html>