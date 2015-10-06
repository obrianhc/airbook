<?php
	require_once 'book.php';
	class testDescargaArchivo extends PHPUnit_Framework_TestCase{
		public function testExisteArchivoTrue(){
			$archivo = new element_book(0,0,0,0);
			$archivo->getBook(1);
	  		$res = $archivo->getPath();
			$this->assertNotNull($res);//si no es nulo pasa la prueba
			$this->assertNotNull($archivo);//si no es nulo pasa la preba
		}
}

