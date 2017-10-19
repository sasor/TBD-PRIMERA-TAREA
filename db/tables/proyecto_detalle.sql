CREATE TABLE proyecto_detalle
(
   proyecto_detalle_id serial,
   proyecto integer,
   titulo_proyecto character varying(200),
   resumen_proyecto text,
   CONSTRAINT pk_proyecto_detalle PRIMARY KEY(proyecto_detalle_id, proyecto)
);
