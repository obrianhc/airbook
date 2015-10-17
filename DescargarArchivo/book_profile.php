<?php
	include('book.php');
	$libro = new element_book(0,0,0,0);
	$libro->getBook($_GET['id']);
?>
<ul>
	<li><?php echo $libro->getTitle(); ?></li>
	<li><?php echo $libro->getDescription(); ?></li>
	<li><a href="<?php echo $libro->getPath(); ?>" target="blank">Descargar</a></li>
</ul>