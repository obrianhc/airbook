<?php
	
	require_once 'Usuario.php';
	require_once 'Mensaje.php';
	class testInbox extends PHPUnit_Framework_TestCase{



	public function testSendMessageTrue(){
            $inbox = new Inbox();
			$mensaje = $inbox->setMessage(1,"cualquier texto",2);//se envia el id del remitente, el mensaje y el id del destinatario
			$this->assertTrue(($mensaje!=null));   //si el resultado es true, la prueba es satisfactoria

  		
		}

        public function testReadMessageTrue(){
            $inbox = new Inbox();
			$mensaje = $inbox->getMessage(2); // se envia el id del destinatario(usuario actual de sesion que quiere leer sus mensajes) y se obtienen los mensajes.
			$this->assertNotNull($mensaje);   //si el resultado es true, la prueba es satisfactoria

  		
		}

	


}

