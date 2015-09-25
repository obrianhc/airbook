<?php
	
	require_once 'Usuario.php';
	require_once 'Mensaje.php';
	class testInbox extends PHPUnit_Framework_TestCase{



	public function testSendMessageTrue(){
            $usu = new Usuario($id);
	    $mensaje = new Mensaje(1,"cualquier texto");
            $insert = $usu->SendMessage($mensaje);
	    $this->assertTrue($insert);   //si el resultado es true, la prueba es satisfactoria

  		
		}

        public function testReadMessageTrue(){
            $usu = new Usuario($id);
            $read = $usu->ReadMessage(1);
	    $this->assertNotNull($read);   //si el resultado es true, la prueba es satisfactoria

  		
		}

	


}

