<?php
	
	require_once 'ranking.php';
	class testRanking extends PHPUnit_Framework_TestCase{
		public function testGetBook(){
			$ranking = new Ranking();
			$libro = $ranking->getBook(1); // Se envia el id de un libro para obtener la informaci'on del mismo.
			$this->assertNull(!$libro);
		}

		public function testRate(){
			$ranking = new Ranking();
			$rate = $ranking->rate(1,1,3); // Valores para calificar de 1-5, se espera que responda si el valor es correcto. id_usuario, id_archivo
			$this->assertTrue($rate);
		}

		public function testRateFalse(){
			$ranking = new Ranking();
			$rate = $ranking->rate(1,1,0);
			$this->AssertFalse($rate);
			$rate = $ranking->rate(1,1,6);
			$this->assertFalse($rate);
		}

		public function testGetRate(){
			$ranking = new Ranking();
			$rate = $ranking->getRate(1); // Obtiene la calificacion de un archivo
			$this->assertGreaterThanOrEqual(0, $rate);
		}
	}