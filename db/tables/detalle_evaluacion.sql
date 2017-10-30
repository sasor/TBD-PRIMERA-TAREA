CREATE TABLE detalle_evaluacion
(
   detalle_evaluacion_id serial,
   proyecto_asignado_id integer,
   calificacion integer,
   status_evaluacion integer,
   valoracion_evaluacion integer,
   CONSTRAINT pk_detalle_evaluacion PRIMARY KEY(detalle_evaluacion_id, proyecto_asignado_id)
);
