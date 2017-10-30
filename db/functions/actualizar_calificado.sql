CREATE OR REPLACE FUNCTION actualizar_calificado
(_detalle INTEGER, _asignado INTEGER, _cal INTEGER, _val INTEGER, _eva INTEGER)
RETURNS VOID
AS
$BODY$
DECLARE
BEGIN
   UPDATE detalle_evaluacion
   SET calificacion = _cal,
       status_evaluacion = _eva,
       valoracion_evaluacion = _val
   WHERE detalle_evaluacion_id = _detalle 
   AND proyecto_asignado_id = _asignado;
   --RAISE NOTICE '% % % % %',_detalle,_asignado,_cal,_val,_eva;
END;
$BODY$
LANGUAGE plpgsql;
