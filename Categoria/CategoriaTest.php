<?php
	
	require_once 'categoria.php';
	class Categoria extends PHPUnit_Framework_TestCase{
		public function testCreateCategory(){
			$Categoria = new Categoria();
			$Cat = $Categoria->getCategoria(1); // Se envia parametro de 1 ID con el objetivo de obtener un el dato de retorno de la funcion getCategoria() en donde comprueba que se hayan insertado las categorias como debia.
			$this->assertTrue(($Cat!=null));
		}

		public function testDeleteCategory(){
			$Categoria = new Categoria();
			$Catdel = $Categoria->getDeleteCategory(1); // despues de haber eliminado la categoria es importante que pueda devolvernos un 1 como parametro de bandera, como comprobacion que fue eliminada la categoria
			$this->assertTrue(($Catdel!=null));
		}

		public function testModifyCategory(){
			$Categoria = new Categoria();
			$Catmodifica = $Categoria->getDeleteCategory(1); // despues de haber modificado la categoria es importante que peuda devolvernos un 1 como parametro de bandera, como comprobacion que fue eliminada la categoria
			$this->assertTrue(($Catmodifica!=null));
		}

	}