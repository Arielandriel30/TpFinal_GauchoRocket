
CREATE DATABASE gauchorocket;
USE gauchorocket;



LOCK TABLES `usuario` WRITE;

INSERT INTO `usuario` VALUES (1,'Ariel','12345',1),(2,'Visita','visita',0);

UNLOCK TABLES;
