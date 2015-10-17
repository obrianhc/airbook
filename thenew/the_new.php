<html>
	<head>
		<title>Lo nuevo</title>
		<style>
			table td{
				border:1px solid #000;
			}
		</style>
	</head>
	<body>
		<?php
			require_once('book.php');
			$book = new book();
			$lista = $book->new_entries_by_category(3);
			$elemento = new element_book(0,0,"","");
			$x = 0;
			echo '<table>';
			while($x < count($lista)){
				$elemento = $lista[$x];
				echo '<tr><td>' . $elemento->getTitle() . '</td><td>' . $elemento->getDescription() . '</td></tr>';
				$x++;
			}
			echo '</table>';
		?>
	</body>
</html>