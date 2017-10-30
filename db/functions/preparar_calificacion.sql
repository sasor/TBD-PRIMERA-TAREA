CREATE OR REPLACE FUNCTION preparar_calificacion
(_asignacion_id INTEGER)
RETURNS JSON
AS
$BODY$
DECLARE
   calificaciones CALIFICACION[];
   valoraciones VALORACION_PROYECTO[];
   evaluaciones EVALUACION_STATUS[];
   titulo TEXT;
   output JSON;
BEGIN
   calificaciones := obtener_calificaciones();
   valoraciones := obtener_valoracion();
   evaluaciones := obtener_evaluacion();

   SELECT pd.titulo_proyecto
   FROM (SELECT proyecto
         FROM proyecto_asignado
         WHERE proyecto_asignado_id = _asignacion_id) p, proyecto_detalle pd
   WHERE p.proyecto = pd.proyecto_detalle_id INTO titulo;

   RETURN row_to_json((_asignacion_id,titulo,calificaciones,valoraciones,evaluaciones));
END;
$BODY$
LANGUAGE plpgsql;
