<?php
	
	require_once 'categoria.php';
	class testCategoria extends PHPUnit_Framework_TestCase{
		public function testCreateCategory(){
			$Categoria = new Categoria();
			$Categoria->setCategoria("CategoriaPrueba", "Esta categoria es insertando por prueba unitaria");
			// Se envia parametro de 1 ID con el objetivo de obtener un el dato de retorno de la funcion getCategoria() en donde comprueba que se hayan insertado las categorias como debia.
			$this->assertTrue($Categoria->Create());
		}

		public function testDeleteCategory(){
			$Categoria = new Categoria();
			$Categoria->getById(9);
			// Despues de haber eliminado la categoria es importante que pueda devolvernos un 1 como parametro de bandera, como comprobacion que fue eliminada la categoria
			$this->assertTrue($Categoria->Delete());
		}

		public function testModifyCategory(){
			$Categoria = new Categoria();
			$Categoria->getById(1);
			// Despues de haber modificado la categoria es importante que peuda devolvernos un 1 como parametro de bandera, como comprobacion que fue eliminada la categoria
			$this->assertTrue($Categoria->Modify("Biologia","Es la ciencia que tiene como objeto de estudio a los seres vivos."));
		}

	}