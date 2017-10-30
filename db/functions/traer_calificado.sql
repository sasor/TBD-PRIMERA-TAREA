CREATE OR REPLACE FUNCTION traer_calificado
(_asignado INTEGER)
RETURNS JSON
AS
$BODY$
DECLARE
   i DETALLE_EVALUACION;
   calificaciones CALIFICACION[];
   valoraciones VALORACION_PROYECTO[];
   evaluaciones EVALUACION_STATUS[];
   titulo TEXT;
BEGIN
   calificaciones := obtener_calificaciones();
   valoraciones := obtener_valoracion();
   evaluaciones := obtener_evaluacion();

   SELECT pd.titulo_proyecto
   FROM (SELECT proyecto
         FROM proyecto_asignado
         WHERE proyecto_asignado_id = _asignado) p, proyecto_detalle pd
   WHERE p.proyecto = pd.proyecto_detalle_id INTO titulo;

   SELECT detalle_evaluacion_id,proyecto_asignado_id,calificacion,status_evaluacion,valoracion_evaluacion
   FROM detalle_evaluacion
   WHERE proyecto_asignado_id = _asignado INTO i;

   RETURN row_to_json((i,titulo,calificaciones,valoraciones,evaluaciones));

END;
$BODY$
LANGUAGE plpgsql;
