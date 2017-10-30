CREATE TABLE proyecto_asignado
(
   proyecto_asignado_id serial,
   usuario INTEGER,
   proyecto INTEGER,
   calificado BOOLEAN,
   CONSTRAINT pk_proyecto_asignado PRIMARY KEY(proyecto_asignado_id, usuario, proyecto)
);
