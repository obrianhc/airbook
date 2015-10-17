CREATE TABLE inbox(
id_remitente INT(11) NOT NULL REFERENCES usuario(id_usuario)
ON DELETE CASCADE ON UPDATE CASCADE,
mensaje TEXT NOT NULL, 
id_destinatario INT(11) NOT NULL REFERENCES usuario(id_usuario)
ON DELETE CASCADE ON UPDATE CASCADE, 
id_mensaje INT NOT NULL AUTO_INCREMENT,
PRIMARY KEY( id_mensaje, id_remitente)
);

