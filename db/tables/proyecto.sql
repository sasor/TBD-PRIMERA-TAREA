CREATE TABLE proyecto
(
   proyecto_id serial,
   tipo_proyecto_id integer,
   dependencia_id integer,
   proyecto_status_id integer,
   CONSTRAINT pk_proyecto PRIMARY KEY(proyecto_id)
);
