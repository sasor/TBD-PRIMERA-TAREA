CREATE TABLE proyecto_usuario
(
   proyecto integer,
   usuario integer,
   activo boolean,
   CONSTRAINT pk_proyecto_usuario PRIMARY KEY(proyecto, usuario)
);
