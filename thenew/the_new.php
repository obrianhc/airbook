<html>
	<head>
		<title>Lo nuevo</title>
	</head>
	<body>
		<?php
			require_once('book.php');
			$book = new book();
			$lista = $book->new_entries_by_category(3);
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