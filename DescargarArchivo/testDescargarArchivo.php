<?php
	
	require_once 'Archivo.php';
	class testDescargaArchivo extends PHPUnit_Framework_TestCase{



	public function testExisteArchivoTrue(){

		$archivo = new Archivo($id);
  		$res = $archivo->path;
		$this->assertNotNull($res);//si no es nulo pasa la prueba 
		$this->assertNotNull($archivo);//si no es nulo pasa la preba 		
				
		}



}

