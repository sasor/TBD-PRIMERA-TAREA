CREATE OR REPLACE FUNCTION obtener_calificaciones
()
RETURNS CALIFICACION[]
AS
$BODY$
DECLARE
   i CALIFICACION[];
BEGIN
   SELECT ARRAY(
      SELECT (calificacion_id, calificacion)::CALIFICACION
      FROM calificacion
   ) INTO i;
   --RAISE NOTICE '%',i;
   RETURN i;
END;
$BODY$
LANGUAGE plpgsql;
