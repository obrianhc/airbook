<?php
	
	require_once 'Comment.php';
	class testComment extends PHPUnit_Framework_TestCase{


		public function testCommentTrue(){
		$comment = new Comment();
		$res = $comment->insert(1,1,'Esto es un comentario');//este metodo recibe tres parametros id_usuario,id_archivo y el comentario respectivamente
		$this->assertTrue($res);		
	
		}


		public function testCommentFalse(){
		$comment = new Comment();
		$res = $comment->insert(1,1,'Esto es un comentario');//este metodo recibe tres parametros id_usuario,id_archivo y el comentario respectivamente
		$this->assertFalse($res);		
	
		}

		
	
	}

//phpunit UnitTest archivo.php


