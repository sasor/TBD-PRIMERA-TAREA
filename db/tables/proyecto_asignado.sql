CREATE TABLE proyecto_asignado
(
   proyecto_asignado_id serial,
   usuario integer,
   proyecto integer,
   CONSTRAINT pk_proyecto_asignado PRIMARY KEY(proyecto_asignado_id, usuario, proyecto)
);
