CREATE OR REPLACE FUNCTION calificar_proyecto
(_asignacion INTEGER, _calificacion INTEGER, _valoracion INTEGER, _evaluacion INTEGER)
RETURNS VOID
AS
$BODY$
DECLARE
BEGIN
   UPDATE proyecto_asignado
   SET calificado = 't'
   WHERE proyecto_asignado_id = _asignacion;

   INSERT INTO detalle_evaluacion
   (proyecto_asignado_id, calificacion, status_evaluacion, valoracion_evaluacion)
   VALUES
   (_asignacion, _calificacion, _evaluacion, _valoracion);
END;
$BODY$
LANGUAGE plpgsql;
